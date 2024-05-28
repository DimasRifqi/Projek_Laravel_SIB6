<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisProdukController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KartuController;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',function(){
    return view('front.home');
});

Route::get('/percobaan_pertama',function(){
    return view('hello');
});

Route::get('/salam',function(){
    return '<h1>selamat pagi</h1>';
});

Route::get('/staff/{nama}/{divisi}',function($nama,$divisi){
    return 'Nama Pegawai'.$nama. '<br> Departemen'.$divisi;
});

Route::get('/daftar_nilai',function(){
    return view('nilai.daftar_nilai');
});

// Route::get('/dashboard',function(){
//     return view('admin.dashboard');
// });


Route::prefix('admin')->group(function(){

    Route::get('/jenis_produk',[JenisProdukController::class, 'index']);
    Route::post('/jenis_produk/store',[JenisProdukController::class, 'store']);

    Route::resource('produk', ProdukController::class);
    Route::resource('pelanggan',PelangganController::class);

    Route::get('/kartu',[KartuController::class,'index']);
    Route::post('kartu/store', [KartuController::class, 'store']);

    // Route::get('/dashboard',[DashboardController::class, 'index']);
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

});