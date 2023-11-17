<?php

namespace App\Http\Controllers\Mua;

use App\Http\Controllers\Controller;
use App\Models\Client\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $book = Booking::all();

        return view('mua.pages.booking.mua_booking', compact('book'));
    }

    // please make three function store,update,delete an


}
