<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Data_Produk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class DataProdukController extends Controller
{
    public function index()
    {
        $produk = Data_Produk::all();
        return view('admin.pages.master.data_produk', compact('produk'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('images_data_produk'), $imageName);

            Data_Produk::create([
                "name" => $request->name,
                "description" => $request->description,
                "price" => $request->price,
                "active" => false,
                "image" => '/images_data_produk/' . $imageName,
            ]);

            Alert::success('Sukses', 'Produk berhasil disimpan.');

            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Kesalahan', 'Terjadi kesalahan saat menyimpan produk: ' . $e->getMessage());

            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $produk = Data_Produk::find($id);

            if (!$produk) {
                return redirect()->back()->withErrors(['Produk tidak ditemukan.']);
            }

            // Update data produk
            $produk->name = $request->name;
            $produk->description = $request->description;
            $produk->price = $request->price;

            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if (File::exists(public_path($produk->image))) {
                    File::delete(public_path($produk->image));
                }

                // Upload gambar baru
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images_data_produk'), $imageName);
                $produk->image = '/images_data_produk/' . $imageName;
            }

            $produk->save();

            Alert::success('Sukses', 'Produk berhasil diperbarui.');

            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Kesalahan', 'Terjadi kesalahan saat memperbarui produk: ' . $e->getMessage());

            return redirect()->back();
        }
    }

    public function updateStatus(Request $request)
    {
        $isChecked = $request->input('isChecked');
        $productId = $request->input('productId');

        // Menggunakan model Data_Produk untuk memperbarui status
        $produk = Data_Produk::find($productId);
        if ($produk) {
            $produk->active = $isChecked ? 1 : 0;
            $produk->save();
        }

        // Berikan respons ke klien jika diperlukan
    }

    public function destroy($id)
    {
        try {
            $produk = Data_Produk::findOrFail($id);

            $imagePath = public_path('images_data_produk/' . basename($produk->image));

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $produk->delete();

            Alert::success('Sukses', 'Produk berhasil dihapus.');
        } catch (\Exception $e) {
            Alert::error('Kesalahan', 'Terjadi kesalahan saat menghapus produk: ' . $e->getMessage());
        }

        return redirect()->back();
    }
}
