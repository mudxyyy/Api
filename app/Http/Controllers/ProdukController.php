<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    //INI UNTUK MENAMPILKAN SEMUA PRODUK
    public function index()
    {
        $data = Produk::with('kategori')->get();

        return response(
            [
                'data' => $data
            ]
        );
    }

    //INI UNTUK MENAMPILKAN SATU PRODUK
    public function show(Produk $produk)
    {
        return response(
            [
                'data' => $produk
            ]
        );
    }

    //INI UNTUK MENGHAPUS SATU PRODUK
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return response(
            [
                'message' => 'Delete Success'
            ]
        );
    }

    //INI UNTUK MENAMBAHKAN PRODUK
    public function store(Request $request)
    {
        $str = $request->validate(
            [
                'name' => 'required',
                'harga' => 'required|numeric',
                'deskripsi' => 'required',
                'kategori_id' => 'required|exists:kategoris,id'
            ]
        );

        Produk::create($str);

        return response(
            [
                'message' => 'Data Added',
                'data' => $str
            ],
            201
        );
    }

    //INI UNTUK EDIT SATU PRODUK
    public function update(Request $request, Produk $produk)
    {
        $str = $request->validate(
            [
                'name' => 'required',
                'harga' => 'required|numeric',
                'deskripsi' => 'required',
                'kategori_id' => 'required|exists:kategoris,id'
            ]
        );

        $produk->update($str);

        return response(
            [
                'message' => 'Data Updated',
                'data' => $str
            ],
            201
        );
    }
}
