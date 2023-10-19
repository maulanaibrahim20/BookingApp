<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('autentikasi.login');
    }

    public function login(Request $request)
    {
        $user = User::where("username", $request->username)->first();

        if (!$user) {
            Alert::error('Login Gagal', 'Akun tidak terdaftar');
            return back();
        }
        if (!Hash::check($request->password, $user->password)) {
            Alert::error('Login Gagal', 'Password Anda Salah');
            return back();
        }
        if (Auth::attempt(["username" => $request->username, "password" => $request->password])) {
            $request->session()->regenerate();

            if ($user->role_id == 1) {
                return redirect("/admin")->withSuccess('Selamat Anda Berhasil Login sebagai "Admin"');
            } else if ($user->role_id == 2) {
                return redirect("/mua")->withSuccess('Selamat Anda Berhasil Login sebagai "MUA"');
            } else if ($user->role_id == 3) {
                return redirect("/client")->withSuccess('Selamat Anda Berhasil Login sebagai "CLIENT"');
            }
        } else {
            return back();
            Alert::error('Login Gagal', 'Password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        Alert::success('Berhasil Logout', 'Sukses');
        return redirect('/login');
    }
}
