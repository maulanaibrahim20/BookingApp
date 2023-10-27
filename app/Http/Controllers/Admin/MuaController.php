<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mua\Master\Makeup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class MuaController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', 2)
            ->where('name', '!=', 'mua')
            ->get();

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.pages.mua.mua', compact('users'));
    }


    public function store(Request $request)
    {
        try {
            $user = User::create([
                "name" => $request->name,
                "username" => Str::slug($request->name),
                "email" => $request->email,
                "alamat" => $request->alamat,
                "password" => bcrypt("password"),
                "no_telp" => $request->no_telp,
                "role_id" => '2',
            ]);

            return redirect()->back()->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            User::where("id", $id)->update([
                "name" => $request->name,
                "username" => Str::slug($request->name),
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

    public function destroy(string $id)
    {
        $data = User::where("id", $id)->first();


        $data->delete();

        Alert::success('Sukses', 'Data yang Anda masukkan berhasil diperbaharui')->autoclose(3000);

        return back();
    }
}
