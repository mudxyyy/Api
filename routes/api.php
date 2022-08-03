<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [UserController::class, 'logout']);

//INI ROUTE UNTUK PRODUK
Route::middleware('auth:sanctum')->apiResource('produk', ProdukController::class);

//INI ROUTE UNTUK KATEGORI
Route::middleware('auth:sanctum')->apiResource('kategori', KategoriController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});