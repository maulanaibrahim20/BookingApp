<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Mua\Master\Makeup;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function store(Request $request)
    {
        dd($request->all());
    }
}
