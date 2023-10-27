<?php

namespace App\Http\Controllers\Mua\Master;

use App\Http\Controllers\Controller;
use App\Models\Mua\DetailMakeup;
use App\Models\Mua\Master\Makeup;
use App\Models\Mua\Master\TypeMakeup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class MakeupController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user) {
            $user_id = $user->id;
            $makeup = Makeup::with('detailMakeup')->where('user_id', $user_id)->get();
        } else {
            $makeup = [];
        }

        $tipe = TypeMakeup::all();
        return view('mua.pages.makeup.makeup', compact('makeup', 'tipe'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images_makeup'), $imageName);

            $makeup = Makeup::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => '/images_makeup/' . $imageName,
                'user_id' => Auth::user()->id,
            ]);

            $makeupId = $makeup->id;

            $selectedTypeMakeup = $request->input('type_makeup');

            foreach ($selectedTypeMakeup as $typeMakeupId) {
                DetailMakeup::create([
                    'id_makeup' => $makeupId,
                    'id_type_makeup' => $typeMakeupId,
                ]);
            }
            Alert::success('Sukses', 'Data berhasil disimpan');
            return back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Terjadi kesalahan saat menyimpan data' . $e->getMessage());
            return back();
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $makeup = Makeup::find($id);

            if (!$makeup) {
                Alert::error('Error', 'Makeup tidak ditemukan');
                return back();
            }

            // Perbarui data dalam entri Makeup
            $makeup->name = $request->name;
            $makeup->description = $request->description;
            $makeup->price = $request->price;

            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if (File::exists(public_path($makeup->image))) {
                    File::delete(public_path($makeup->image));
                }

                // Upload gambar baru
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images_makeup'), $imageName);
                $makeup->image = '/images_makeup/' . $imageName;
            }

            $makeup->save();

            $makeupId = $makeup->id;

            $selectedTypeMakeup = $request->input('makeup_update');

            DetailMakeup::where('id_makeup', $makeupId)->delete();

            foreach ($selectedTypeMakeup as $typeMakeupId) {
                DetailMakeup::create([
                    'id_makeup' => $makeupId,
                    'id_type_makeup' => $typeMakeupId,
                ]);
            }

            Alert::success('Sukses', 'Data berhasil diperbarui');
            return back();
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $makeup = Makeup::find($id);

            if (!$makeup) {
                Alert::error('Error', 'Makeup tidak ditemukan');
                return back();
            }

            $imagePath = public_path('images_makeup/' . basename($makeup->image));

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            // Hapus data Makeup
            $makeup->delete();

            Alert::success('Sukses', 'Data berhasil dihapus');
            return back();
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return back();
        }
    }


    public function getDataType(Request $request)
    {
        $id = $request->input('id');
        $detailMakeup = DetailMakeup::where('id_makeup', $id)->get();

        if ($detailMakeup->isNotEmpty()) {
            return response()->json($detailMakeup);
        } else {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }
    }
}
