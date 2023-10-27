<?php

namespace App\Http\Controllers\Mua\Master;

use App\Http\Controllers\Controller;
use App\Models\Mua\Master\TypeMakeup;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TypeMakeupController extends Controller
{
    public function index()
    {
        $type = TypeMakeup::where('user_id', Auth::user()->id)->get();
        return view('mua.pages.master.type', compact('type'));
    }

    public function store(Request $request)
    {
        try {
            TypeMakeup::create([
                'name' => $request->name,
                'user_id' => Auth::user()->id,
            ]);

            Alert::success('Sukses', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menambahkan data');
        }
        return back();
    }

    public function update(Request $request, $id)
    {
        try {
            TypeMakeup::where("id", $id)->update([
                "name" => $request->name,
            ]);

            Alert::success('Sukses', 'Data berhasil diubah.');

            return back();
        } catch (\Exception $e) {
            Alert::error('Kesalahan', 'Terjadi kesalahan saat mengubah data: ' . $e->getMessage());

            return back();
        }
    }

    public function destroy($id)
    {
        $data = TypeMakeup::where("id", $id)->first();


        $data->delete();

        Alert::success('Sukses', 'Data yang Anda masukkan berhasil diperbaharui')->autoclose(3000);

        return back();
    }
}
