<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //INI UNTUK MENAMPILKAN SEMUA KATEGORI
    public function index()
    {
        $data = Kategori::all();

        return response(
            [
                'data' => $data
            ]
        );
    }

    //INI UNTUK MENAMPILKAN SATU KATEGORI
    public function show(Kategori $kategori)
    {
        return response(
            [
                'data' => $kategori
            ]
        );
    }

    //INI UNTUK MENGHAPUS SATU KATEGORI
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return response(
            [
                'message' => 'Delete Success'
            ]
        );
    }

    //INI UNTUK MENAMBAHKAN KATEGORI
    public function store(Request $request)
    {
        $str = $request->validate(
            [
                'name' => 'required'
            ]
        );

        Kategori::create($str);

        return response(
            [
                'message' => 'Data Added',
                'data' => $str
            ],
            201
        );
    }

    //INI UNTUK EDIT SATU KATEGORI
    public function update(Request $request, Kategori $kategori)
    {
        $str = $request->validate(
            [
                'name' => 'required'
            ]
        );

        $kategori->update($str);

        return response(
            [
                'message' => 'Data Updated',
                'data' => $str
            ],
            201
        );
    }
}
