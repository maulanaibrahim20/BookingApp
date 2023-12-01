<?php

namespace App\Http\Controllers\Akun;

use App\Http\Controllers\Controller;
use App\Models\Akun\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function index()
    {
        return view('autentikasi.register');
    }

    public function store(Request $request)
    {

        try {
            $user = User::create([
                "name" => $request->name,
                "username" => Str::slug($request->name),
                "email" => $request->email,
                "alamat" => $request->alamat,
                "password" => $request->password,
                "no_telp" => $request->no_telp,
                "role_id" => '3',
            ]);

            Customer::create([
                "id_customer" => "CUST-" . date("YmdHis"),
                "user_id" => $user->id,
                "pekerjaan" => $request->pekerjaan,
            ]);
            Alert::success('Sukses', 'Data berhasil disimpan.');
            return redirect('/login');
        } catch (\Exception $e) {
            // Pesan kesalahan jika terjadi kegagalan
            Alert::error('Kesalahan', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());

            return redirect()->back();
        }
    }
}
