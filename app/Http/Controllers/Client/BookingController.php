<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin\Management\ManagementContent;
use App\Models\Akun\Customer;
use App\Models\Client\Booking;
use App\Models\Mua\Master\Makeup;
use App\Models\Payment\MidtransHistory;
use App\Models\Payment\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Midtrans\Snap;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;


class BookingController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $booking = Booking::join('customer', 'booking.id_customer', '=', 'customer.id_customer')
            ->where('customer.user_id', $user->id)
            ->get();
        $makeup = Makeup::select('id', 'name')->get();

        // $orders = Order::join('customer', 'order.id_customer', '=', 'customer.id_customer')
        //     ->where('customer.user_id', $user->id)
        //     ->get();

        // dd($orders);

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
                        'id_order' => "ORDER-" . date("YmdHis"),
                        'user_id_mua' => $makeup->user_id,
                        'name' => $request->name,
                        'makeup' => $request->makeup,
                        'type_makeup' => $request->type_makeup,
                        'tanggal_booking' => $tanggal_booking,
                        'waktu_booking' => $request->waktu,
                        'status' => '0',
                        'payment_status' => 'unpaid',
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

                    // $user = Auth::user();

                    // dd($user->email);

                    $params = array(
                        'transaction_details' => array(
                            'order_id' => $booking->id_order,
                            'gross_amount' => $makeup->price,
                        ),
                        'customer_details' => array(
                            'first_name' => $user->name,
                            'last_name' => $user->name,
                            'email' => $user->email,
                            'phone' => $user->no_telp,
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

    public function payment($id_order, Request $request)
    {
        $booking = Booking::where('id_order', $id_order)->first();
        $makeup = Makeup::find($booking->makeup)->first();

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $user = Auth::user();

        // dd($booking->id_order);

        $params = array(
            'transaction_details' => array(
                'order_id' => $booking->id_order,
                'gross_amount' => $makeup->price,
            ),
            'customer_details' => array(
                'first_name' => $user->name,
                'last_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->no_telp,
            ),
        );


        $snapToken = Snap::getSnapToken($params);
        // dd($snapToken);

        return view('client.booking.v_booking', compact('booking', 'snapToken'));
    }

    public function cetak_pdf($id_booking, Request $request)
    {
        $booking = Booking::where('id_booking', $id_booking)->first();
        $user = Auth::user()->name;

        $pdf = Pdf::loadview('client.invoice.cetak_invoice', compact('booking'));

        $filename = $user . '_invoice_' . $booking->id_booking . '.pdf';

        return $pdf->stream($filename);
    }

    public function invoice($id_booking)
    {
        $booking = Booking::find($id_booking);
        return view('client.invoice.invoice', compact('booking'));
    }

    public function callback(Request $request)
    {
        try {
            $payload = $request->all();
            $serverKey = config('midtrans.server_key');
            $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

            if ($hashed == $request->signature_key) {
                if ($request->transaction_status == 'capture') {
                    $order = Booking::where('id_order', $request->order_id)->first();

                    if ($order) {
                        DB::beginTransaction();

                        try {
                            $midtrans = MidtransHistory::create([
                                'order_id' => $payload['order_id'],
                                'status' => $payload['status_code'],
                                'payload' => json_encode($payload),
                            ]);

                            $order->update(['payment_status' => 'paid']);

                            DB::commit();

                            return response()->json(['status' => 'success', 'message' => 'Order updated successfully', 'midtrans' => $midtrans]);
                        } catch (\Exception $e) {
                            DB::rollback();
                            Log::error('Error updating order and creating MidtransHistory: ' . $e->getMessage());
                            return response()->json(['status' => 'error', 'message' => 'Internal Server Error'], 500);
                        }
                    } else {
                        return response()->json(['status' => 'error', 'message' => 'Order not found'], 404);
                    }
                } else {
                    return response()->json(['status' => 'error', 'message' => 'Invalid transaction status'], 400);
                }
            } else {
                return response()->json(['status' => 'error', 'message' => 'Invalid signature'], 400);
            }
        } catch (\Exception $e) {
            Log::error('Error in callback: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Internal Server Error'], 500);
        }
    }
}
