<?php

use App\Http\Controllers\User;
use App\Http\Controllers\Anggota;
use App\Http\Controllers\Sirkulasi;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route User
// get buku
Route::get('/view', [User::class, 'view']);

// get detail buku
Route::get('/detail/{parameter}', [User::class, 'detail']);

// menghapus data Buku
Route::delete('/delete/{parameter}', [User::class, 'delete']);

// membuuat Input data buku
Route::post('/insert', [User::class, 'insert']);

// Update Data buku
Route::put('/update/{parameter}', [User::class, 'update']);


// route Anggota
// get anggota
Route::get('/view/anggota', [Anggota::class, 'view']);

// get detail
Route::get('/anggota/{parameter}', [Anggota::class, 'detail']);

// menghapus data Buku
Route::delete('/delete/anggota/{parameter}', [Anggota::class, 'delete']);

// insert data anggota
Route::post('/insert/anggota', [Anggota::class, 'insert']);

// Update Data Anggota
Route::put('/update/anggota/{parameter}', [Anggota::class, 'update']);


// route sirkulasi
// get data sirkulasi
Route::get('/view/sirkulasi', [Sirkulasi::class, 'view']);

// detail data sirkulasi
Route::get('/sirkulasi/{parameter}', [Sirkulasi::class, 'detail']);

// delete data sirkulasi
Route::delete('/sirkulasi/delete/{parameter}', [Sirkulasi::class, 'delete']);

// insert data sirkulasi 
Route::post('/insert/sirkulasi', [Sirkulasi::class, 'insert']);

// update data sirkulasi
Route::put('/update/sirkulasi/{parameter}', [Sirkulasi::class, 'update']);