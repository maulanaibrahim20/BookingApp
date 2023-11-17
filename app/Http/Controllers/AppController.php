<?php

namespace App\Http\Controllers;

use App\Models\Mua\Master\Makeup;
use App\Models\User;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function admin()
    {
        $data = [
            "jumlah_owner" => User::count(),
            "jumlah_makeup" => Makeup::count()
        ];
        return view('admin.pages.dashboard', $data);
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
