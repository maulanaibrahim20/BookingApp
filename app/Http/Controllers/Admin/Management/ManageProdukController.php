<?php

namespace App\Http\Controllers\Admin\Management;

use App\Http\Controllers\Controller;
use App\Models\Admin\Management\ManagementContent;
use App\Models\Master\Data_Produk;
use Illuminate\Http\Request;

class ManageProdukController extends Controller
{
    public function index()
    {
        $produk = Data_Produk::all();
        return view('admin.pages.monitoring.monitoring_produk', compact('produk'));
    }

    public function changeStatus(Request $request)
    {
        $isChecked = $request->input('isChecked');
        $productId = $request->input('productId');

        // Menggunakan model ManagementContent untuk memperbarui status
        $produk = ManagementContent::find($productId);
        if ($produk) {
            $produk->active = $isChecked ? 1 : 0;
            $produk->save();
        }
        // Memberikan tanggapan yang sesuai
        return response()->json(['status' => 'success']);
    }
}
