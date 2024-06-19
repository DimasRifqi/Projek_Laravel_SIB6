<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProdukResource;
use Illuminate\Http\Request;
use App\Models\JenisProduk;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    //
    public function index(){
        $produk = produk::join('jenis_produk','jenis_produk_id', '=', 'jenis_produk.id')
        ->select('produk.*','jenis_produk.nama as jenis')
        ->get();

        return new ProdukResource(true, 'List Data Produk', $produk);

    }

    public function show($id){

        $produk = produk::join('jenis_produk','jenis_produk_id', '=', 'jenis_produk.id')
        ->select('produk.*','jenis_produk.nama as jenis')
        ->where('produk.id',$id)
        ->get();

        if ($produk->isNotEmpty()) {
            return new ProdukResource(true, 'Detail Data Produk', $produk);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Produk Tidak Ditemukan',
            ], 400);
        }
    }
}