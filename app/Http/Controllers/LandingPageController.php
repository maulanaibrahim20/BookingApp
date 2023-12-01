<?php

namespace App\Http\Controllers;

use App\Models\Admin\Management\ManagementContent;
use App\Models\Akun\Customer;
use App\Models\Master\Data_Produk;
use App\Models\Mua\DetailMakeup;
use App\Models\Mua\Master\Makeup;
use App\Models\Mua\Master\TypeMakeup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LandingPageController extends Controller
{
    public function index()
    {

        // $user = Auth::user();

        // if ($user) {
        //     $customer = Customer::where('user_id', $user->id)->first();
        //     if ($customer) {
        //         dd($customer->id_customer);
        //     }
        // }

        $manage = ManagementContent::where('active', 1)->get();
        $makeup = Makeup::all();
        $produk = Data_Produk::all();
        // $user = Auth::user();

        // dd($user->email);
        return view('landing', compact('manage', 'produk', 'makeup'));
    }

    public function getDataTypeLanding(Request $request)
    {

        $id = $request->makeup;
        $dataTypeLanding = DetailMakeup::with('getType')->where('id_makeup', $id)->get();

        foreach ($dataTypeLanding as $data) {
            echo "<option value='" . $data->getType['id'] . "'>" . $data->getType['name'] . "</option>";
        }
    }
}
