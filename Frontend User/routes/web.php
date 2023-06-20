<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('dashboard_admin');
    })->name('dashboard_admin');

    Route::get('/databuku', function () {
        return view('Admin/databuku');
    })->name('databuku');

    Route::get('/data_anggota', function () {
        return view('Admin/data_anggota');
    })->name('data_anggota');

    Route::get('/sirkulasi', function () {
        return view('Admin/sirkulasi');
    })->name('sirkulasi');
});



Route::prefix('user')->group(function () {
    Route::get('/users', function () {
        // Matches The "/admin/users" URL
    });
});




Route::get('/', function () {
    return view('welcome');
});
