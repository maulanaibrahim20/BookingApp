<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        return view("admin.pages.pengaturan.edit_profile");
    }

    public function update(Request $request, $id)
    {
        try {
            User::where("id", $id)->update([
                "name" => $request->name,
                "username" => Str::slug($request->username),
                "email" => $request->email,
                "alamat" => $request->alamat,
                "no_telp" => $request->no_telp,
            ]);

            Alert::success('Sukses', 'Data berhasil diubah.');

            return back();
        } catch (\Exception $e) {
            Alert::error('Kesalahan', 'Terjadi kesalahan saat mengubah data: ' . $e->getMessage());

            return back();
        }
    }
}
