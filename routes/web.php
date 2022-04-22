<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FasilitasHotelController;
use App\Http\Controllers\FasilitasKamarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', IndexController::class)->name('index');

Route::resource('reservasi', ReservasiController::class);

Route::resource('login', LoginController::class)->only(['index', 'store']);

Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::middleware('admin')->group(function () {
    Route::get('admin', [HomeController::class, 'admin'])->name('admin.home');
    Route::resource('admin/kamar', KamarController::class);
    Route::resource('admin/fasilitas-kamar', FasilitasKamarController::class);
    Route::resource('admin/fasilitas-hotel', FasilitasHotelController::class);
    
    
    
});

Route::middleware('resepsionis')->group(function () {
    Route::get('resepsionis', [HomeController::class, 'resepsionis'])->name('resepsionis.home');
    Route::get('resepsionis/pending', [HomeController::class, 'pending'])->name('resepsionis.pending');
    Route::get('resepsionis/checkin', [HomeController::class, 'checkin'])->name('resepsionis.checkin');
    Route::get('resepsionis/checkout', [HomeController::class, 'checkout'])->name('resepsionis.checkout');
});