<?php

namespace App\Http\Controllers;

use App\Models\Master\Data_Produk;
use App\Models\Mua\DetailMakeup;
use App\Models\Mua\Master\Makeup;
use App\Models\Mua\Master\TypeMakeup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LandingPageController extends Controller
{
    public function index()
    {
        $makeup = Makeup::select('id', 'name')->get();
        return view('landing', compact('makeup'));
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
