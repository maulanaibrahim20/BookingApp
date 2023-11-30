<?php

namespace App\Http\Controllers\Mua;

use App\Http\Controllers\Controller;
use App\Models\Client\Booking;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MuaBookingController extends Controller
{
    public function index()
    {
        $booking = Booking::whereHas('getUserMakeup', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->get();


        return view('mua.pages.booking.mua_booking', compact('booking'));
    }

    public function view_invoice($id_booking)
    {
        $user = Auth::user()->id;
        $booking = Booking::where('id_booking', $id_booking)
            ->where('user_id_mua', $user)
            ->first();

        if ($booking) {
            return view('mua.pages.booking.mua_view_invoice', compact('booking'));
        }
        return redirect()->back();
    }

    public function cetak_invoice($id_booking)
    {
        $booking = Booking::where('id_booking', $id_booking)->first();
        $user = Auth::user()->name;

        $pdf = Pdf::loadview('mua.pages.booking.mua_cetak_invoice', compact('booking'));

        $filename = $user . '_invoice_' . $booking->id_booking . '.pdf';

        return $pdf->stream($filename);
    }



    public function changeStatus(Request $request)
    {
        $id_booking = $request->input('id_booking');
        $status = $request->input('status');

        if ($status == 1 || $status == 3) {
            $booking = Booking::find($id_booking);
            if ($booking) {
                $booking->status = $status;
                $booking->save();
                return response()->json(['success' => true, 'message' => 'Status berhasil diubah']);
            }
        }

        return response()->json(['success' => false, 'message' => 'Gagal mengubah status']);
    }
}
