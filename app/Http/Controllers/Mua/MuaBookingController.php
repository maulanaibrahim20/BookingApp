<?php

namespace App\Http\Controllers\Mua;

use App\Http\Controllers\Controller;
use App\Models\Client\Booking;
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
