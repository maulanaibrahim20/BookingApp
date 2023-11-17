<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Akun\Customer;
use App\Models\Client\Booking;
use App\Models\Mua\Master\Makeup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                    $tanggal_booking = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
                    Booking::create([
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
                    Alert::success('Berhasil', 'Booking berhasil dibuat!');
                    return redirect()->back();
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
}
