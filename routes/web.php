<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'dashboard/admin'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [HomeController::class, 'profile'])->name('profile');
        Route::post('update', [HomeController::class, 'updateprofile'])->name('profile.update');
    });

    Route::group(['prefix' => 'akun'], function () {
        Route::get('/', [AkunController::class, 'index'])->name('akun');
        Route::post('showdata', [AkunController::class, 'dataTable'])->name('akun.dataTable');
        Route::match(['get','post'],'tambah', [AkunController::class, 'tambahAkun'])->name('akun.add');
        Route::match(['get','post'],'{id}/ubah', [AkunController::class, 'ubahAkun'])->name('akun.edit');
        Route::delete('{id}/hapus', [AkunController::class, 'hapusAkun'])->name('akun.delete');
        // Route::post('update', [HomeController::class, 'updateprofile'])->name('profile.update');
    });
});
