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
            Alert::error('Login Gagal', 'Periksa Kembali Username & Password Anda');
            return back();
        }
        if (!Hash::check($request->password, $user->password)) {
            Alert::error('Login Gagal', 'Periksa Kembali Username & Password Anda');
            return back();
        }
        if (Auth::attempt(["username" => $request->username, "password" => $request->password])) {
            $request->session()->regenerate();

            if ($user->role_id == 1) {
                return redirect("/admin/dashboard")->withSuccess('Selamat Anda Berhasil Login, Selamat Datang ' . Auth::user()->name);
            } else if ($user->role_id == 2) {
                return redirect("/mua/dashboard")->withSuccess('Selamat Anda Berhasil Login, Selamat Datang ' . Auth::user()->name);
            } else if ($user->role_id == 3) {
                return redirect("/client/dashboard")->withSuccess('Selamat Anda Berhasil Login, Selamat Datang ' . Auth::user()->name);
            }
        } else {
            Alert::error('Login Gagal', 'Password salah');
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();
        Alert::success('Berhasil Logout', 'Sukses');
        return redirect('/login');
    }
}
