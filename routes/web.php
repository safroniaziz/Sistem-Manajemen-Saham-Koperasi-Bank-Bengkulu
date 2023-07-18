<?php

use App\Http\Controllers\AgenPemasaranController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardCOntroller;
use App\Http\Controllers\PejabatBerwenangController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware('auth')->group(function(){
    Route::get('/home', [DashboardCOntroller::class, 'index'])->name('home');

    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index')->name('user');
        Route::get('/user/create', 'create')->name('user.create');
        Route::post('/user', 'store')->name('user.store');
        Route::get('/user/{user}/edit', 'edit')->name('user.edit');
        Route::patch('/user/update', 'update')->name('user.update');
        Route::delete('/user/{user}/delete', 'delete')->name('user.delete');
        Route::patch('/user/ubah_password', 'ubah_password')->name('user.ubah_password');
    });

    Route::controller(PejabatBerwenangController::class)->group(function () {
        Route::get('/pejabat_berwenang', 'index')->name('pejabatBerwenang');
        Route::get('/pejabat_berwenang/create', 'create')->name('pejabatBerwenang.create');
        Route::post('/pejabat_berwenang', 'store')->name('pejabatBerwenang.store');
        Route::get('/pejabat_berwenang/{pejabatBerwenang}/edit', 'edit')->name('pejabatBerwenang.edit');
        Route::patch('/pejabat_berwenang/update', 'update')->name('pejabatBerwenang.update');
        Route::delete('/pejabat_berwenang/{pejabatBerwenang}/delete', 'delete')->name('pejabatBerwenang.delete');
    });

    Route::controller(AgenPemasaranController::class)->group(function () {
        Route::get('/agen_pemasaran', 'index')->name('agenPemasaran');
        Route::get('/agen_pemasaran/create', 'create')->name('agenPemasaran.create');
        Route::post('/agen_pemasaran', 'store')->name('agenPemasaran.store');
        Route::get('/agen_pemasaran/{agenPemasaran}/edit', 'edit')->name('agenPemasaran.edit');
        Route::patch('/agen_pemasaran/update', 'update')->name('agenPemasaran.update');
        Route::delete('/agen_pemasaran/{agenPemasaran}/delete', 'delete')->name('agenPemasaran.delete');
    });
});
