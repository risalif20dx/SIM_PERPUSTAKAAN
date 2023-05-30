<?php

use App\Http\Controllers\User;
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