<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\KategoriBukuRelasiController;
use App\Http\Controllers\KoleksiPribadiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\UlasanBukuController;
use App\Models\KategoriBukuRelasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('/user',UserController::class);
Route::resource('/koleksi',KoleksiPribadiController::class);
Route::resource('/kategoribukurelasi',KategoriBukuRelasiController::class);
Route::resource('/kategoribuku',KategoriBukuController::class);
Route::resource('/peminjaman',PeminjamanController::class);
Route::resource('/riwayat',RiwayatController::class);
Route::resource('/ulasan',UlasanBukuController::class);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register',[AuthController::class,'register']);
Route::resource('/buku',BukuController::class);
// Route::patch('/user/{id}', [UserController::class, 'update']);

