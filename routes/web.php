<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
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
});

Route::group(['middleware' => ['autentikasi']], function () {


    Route::get('/admin', [AppController::class, 'admin']);
    Route::get('/admin/client', function () {
        return view('admin.pages.client');
    });


    Route::get('/mua', [AppController::class, 'mua']);
    Route::get('/client', [AppController::class, 'client']);





    Route::get('/logout', [LoginController::class, 'logout']);
});
