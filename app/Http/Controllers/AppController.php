<?php

namespace App\Http\Controllers;

use App\Models\Client\Booking;
use App\Models\Mua\Master\Makeup;
use App\Models\User;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function admin()
    {
        $data = [
            "jumlah_owner" => User::where('role_id', 2)->count(),
            "jumlah_makeup" => Makeup::count(),
            "jumlah_client" => User::where('role_id', 3)->count(),
            "jumlah_booking" => Booking::count(),
        ];

        $booking = Booking::all();
        return view('admin.pages.dashboard', compact('booking'), $data);
    }

    public function client()
    {
        return view('client.pages.dashboard');
    }

    public function mua()
    {
        return view('mua.pages.dashboard');
    }
}
