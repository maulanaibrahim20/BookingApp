<?php

namespace App\Http\Controllers;

use App\Models\Master\Data_Produk;
use App\Models\Mua\DetailMakeup;
use App\Models\Mua\Master\Makeup;
use App\Models\Mua\Master\TypeMakeup;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $produk = Data_Produk::all();

        $makeup = Makeup::all();
        // $type = DetailMakeup::with('getType')->where('id_makeup', )->get();


        return view('landing', compact('produk', 'makeup'));
    }
}
