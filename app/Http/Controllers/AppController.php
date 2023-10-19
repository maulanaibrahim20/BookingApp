<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function admin()
    {
        return view('admin.pages.dashboard');
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
