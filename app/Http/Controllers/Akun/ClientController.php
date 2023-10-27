<?php

namespace App\Http\Controllers\Akun;

use App\Http\Controllers\Controller;
use App\Models\Akun\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ClientController extends Controller
{
    public function index()
    {

        $users = Customer::all();

        return view('admin.pages.client.client', compact('users'));
    }

    public function store(Request $request)
    {


        try {
            $user = User::create([
                "name" => $request->name,
                "username" => str::slug($request->name),
                "email" => $request->email,
                "alamat" => $request->alamat,
                "password" => bcrypt("password"),
                "no_telp" => $request->no_telp,
                "role_id" => '3',
            ]);

            Customer::create([
                "id_customer" => "CUST-" . date("YmdHis"),
                "user_id" => $user->id,
                "pekerjaan" => $request->pekerjaan,
            ]);

            return redirect()->back()->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $user_id)
    {
        try {
            User::where("id", $user_id)->update([
                "name" => $request->name,
                "username" => $request->username,
                "email" => $request->email,
                "alamat" => $request->alamat,
                "no_telp" => $request->no_telp,
            ]);

            Customer::where("user_id", $user_id)->update([
                "pekerjaan" => $request->pekerjaan
            ]);
            return redirect()->back()->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    public function destroy($id_customer)
    {

        try {
            $user = Customer::where('id_customer', $id_customer)->first();
            $user->delete();
            User::where('id', $user->user_id)->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus!.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menhapus data: ' . $e->getMessage());
        }
    }
}
