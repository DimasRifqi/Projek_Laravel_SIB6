<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KartuController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\JenisProdukController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/',function(){
//     return view('front.home');
// });

Route::get('/', [BerandaController::class, 'index']);

Route::get('add-to-cart/{id}',[BerandaController::class, 'addToCart'])->name('add.to.cart');
ROute::get('/detail_cart/{id}',[BerandaController::class, 'detail']);
ROute::get('/shop_cart',[BerandaController::class, 'cart']);
ROute::patch('/update-cart',[BerandaController::class, 'update'])->name('update.cart');
ROute::delete('/remove-from-cart',[BerandaController::class, 'remove'])->name('remove.from.cart');

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
Route::group(['middleware' => ['auth','checkActive', 'role:admin|manager|staff']], function(){
    Route::prefix('admin')->group(function(){

        Route::get('/user',[UserController::class, 'index']);
        Route::post('/user/{user}/activate',[UserController::class, 'activate'])->name('admin.user.activate');
        Route::get('/profile',[UserController::class, 'showProfile']);
        ROute::patch('profile/{id}', [UserController::class, 'update']);


        Route::get('/jenis_produk',[JenisProdukController::class, 'index']);
        Route::post('/jenis_produk/store',[JenisProdukController::class, 'store']);

        Route::resource('produk', ProdukController::class);
        Route::resource('pelanggan',PelangganController::class);

        Route::get('/kartu',[KartuController::class,'index']);
        Route::post('kartu/store', [KartuController::class, 'store']);

        // Route::get('/dashboard',[DashboardController::class, 'index']);
        Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');



    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');