<?php

use App\Http\Controllers\Admin\Management\ManageMakeupController;
use App\Http\Controllers\Admin\Management\ManageProdukController;
use App\Http\Controllers\Admin\Master\DataProdukController;
use App\Http\Controllers\Admin\MuaController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\Akun\ClientController;
use App\Http\Controllers\Akun\RegisterController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Client\BookingController;
use App\Http\Controllers\Client\MakeupClientController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Mua\Master\MakeupController;
use App\Http\Controllers\Mua\Master\TypeMakeupController;
use App\Http\Controllers\Mua\MuaBookingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingPageController::class, 'index']);

//routing untuk login

Route::group(["middleware" => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::resource('/register', RegisterController::class);
});

Route::group(['middleware' => ['autentikasi']], function () {

    //jquery untuk get data type dari setiap perubahan di select makeup
    Route::get('/LandingGetDataType', [LandingPageController::class, 'getDataTypeLanding']);


    Route::get('/admin/dashboard', [AppController::class, 'admin']);

    Route::get('/admin/monitoring_makeup', [ManageMakeupController::class, 'index']);
    Route::get('/admin/monitoring_makeup/view/{id}', [ManageMakeupController::class, 'show']);
    Route::post('/admin/monitoring_makeup/changestatus', [ManageMakeupController::class, 'changeStatus']);

    Route::get('/admin/monitoring_produk', [ManageProdukController::class, 'index']);
    Route::post('/admin/monitoring_produk/changestatus', [ManageProdukController::class, 'changeStatus']);


    Route::get('/admin/pengaturan/profile_saya', function () {
        return view('admin.pages.pengaturan.profile');
    });
    Route::resource('/admin/pengaturan/profile_saya/edit_profile', ProfileController::class);


    //crud daftar akun mua
    Route::resource('/admin/reg/mua', MuaController::class);
    Route::resource('/admin/reg/client', ClientController::class);

    //curd master Data Produk
    Route::resource('/admin/master/data_produk', DataProdukController::class);
    //untuk jquery mengupdate status
    Route::post('/admin/master/data_produk/updateStatus', [DataProdukController::class, 'updateStatus']);

    // Route::get('/admin/master/data_produk/change', function () {
    //     return view('admin.pages.master.active');
    // });


    Route::get('/mua/dashboard', [AppController::class, 'mua']);
    Route::resource('/mua/makeup', MakeupController::class);
    //getdata untuk typenya
    Route::post('/mua/makeup/getDataType', [MakeupController::class, 'getDataType']);

    Route::resource('/mua/master/type_makeup', TypeMakeupController::class);
    Route::get('/mua/booking', [MuaBookingController::class, 'index']);

    Route::post('/mua/booking/changeStatus', [MuaBookingController::class, 'changeStatus']);


    Route::get('/client/dashboard', [AppController::class, 'client']);

    Route::resource('/client/booking', BookingController::class);


    Route::get('/logout', [LoginController::class, 'logout']);
});
