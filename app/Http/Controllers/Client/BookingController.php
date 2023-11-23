<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin\Management\ManagementContent;
use App\Models\Akun\Customer;
use App\Models\Client\Booking;
use App\Models\Mua\Master\Makeup;
use App\Models\Payment\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $booking = Booking::join('customer', 'booking.id_customer', '=', 'customer.id_customer')
            ->where('customer.user_id', $user->id)
            ->get();
        $makeup = Makeup::select('id', 'name')->get();

        return view('client.pages.client_booking', compact('booking', 'makeup'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        try {
            $user = Auth::user();

            if ($user) {
                $customer = Customer::where('user_id', $user->id)->first();
                if ($customer) {
                    $makeup = Makeup::where('id', $request->makeup)->first();
                    $tanggal_booking = Carbon::createFromFormat('Y-m-d', $request->date)->format('Y-m-d');
                    $booking = Booking::create([
                        'id_booking' =>  "BOOK-" . date("YmdHis"),
                        'id_customer' => $customer->id_customer,
                        'user_id_mua' => $makeup->user_id,
                        'name' => $request->name,
                        'makeup' => $request->makeup,
                        'type_makeup' => $request->type_makeup,
                        'tanggal_booking' => $tanggal_booking,
                        'waktu_booking' => $request->waktu,
                        'status' => false,
                    ]);

                    Order::create([
                        'id_booking' => $booking->id_booking,
                        'id_customer' => $customer->id_customer,
                        'id_mua' => $makeup->user_id,
                        'makeup' => $request->makeup,
                        'total_price' => $request->price,
                        'status' => 'unpaid',
                    ]);

                    // payment GateWay

                    // Set your Merchant Server Key
                    \Midtrans\Config::$serverKey = config('midtrans.server_key');
                    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                    \Midtrans\Config::$isProduction = false;
                    // Set sanitization on (default)
                    \Midtrans\Config::$isSanitized = true;
                    // Set 3DS transaction for credit card to true
                    \Midtrans\Config::$is3ds = true;

                    $params = array(
                        'transaction_details' => array(
                            'order_id' => $booking->id_booking,
                            'gross_amount' => $request->price,
                        ),
                        'customer_details' => array(
                            'name' => $request->name,
                            'makeup' => $request->makeup,
                        ),
                    );

                    $snapToken = Snap::getSnapToken($params);

                    // dd($snapToken);
                    Alert::success('Berhasil', 'Booking berhasil dibuat!');
                    return view('client.booking.v_booking', compact('booking', 'snapToken'));
                } else {
                    Alert::error('Gagal', 'Data customer tidak ditemukan.');
                    return redirect()->back();
                }
            } else {
                Alert::error('Gagal', 'User tidak ditemukan. Silakan login terlebih dahulu.');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat membuat booking. Silakan coba lagi nanti.' . $e->getMessage());
            return redirect()->back();
        }
    }

    // public function bookingPage($id)
    // {
    //     // Lakukan apa pun yang diperlukan dengan ID yang diterima
    //     // Contoh: Mengambil data berdasarkan ID
    //     $manage = ManagementContent::find($id);

    //     return view('client.booking.v_booking', compact('manage'));
    // }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("SHA512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $order = Order::find($request->order_id);
                $order->update(['status' => 'Paid']);
            }
        }
    }
}
