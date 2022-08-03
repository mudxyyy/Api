<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        User::create(
            [
                'name' => 'Admin',
                'username' => 'admin',
                'password'=>bcrypt('admin')
            ]
        );
        Kategori::create(
            [
                'name' => 'Makanan'
            ]
        );
        Kategori::create(
            [
                'name' => 'Minuman'
            ]
        );
        Produk::create(
            [
                'name' => 'Burger',
                'harga' => '12000',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, fuga.',
                'kategori_id' => '1'
            ]
        );
    }
}
