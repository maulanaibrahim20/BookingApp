<?php

namespace App\Http\Controllers\Admin\Management;

use App\Http\Controllers\Controller;
use App\Models\Admin\Management\ManagementContent;
use App\Models\Master\Data_Produk;
use App\Models\Mua\Master\Makeup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageMakeupController extends Controller
{
    public function index()
    {
        $user = User::where('role_id', 2)->get();
        return view('admin.pages.monitoring.monitoring_makeup', compact('user'));
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        $name = $user->name;
        $makeup = Makeup::where('user_id', $id)->get();
        return view('admin.pages.monitoring.view_makeup', compact('makeup', 'name'));
    }

    public function store(Request $request)
    {
        dd($request->all());
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
