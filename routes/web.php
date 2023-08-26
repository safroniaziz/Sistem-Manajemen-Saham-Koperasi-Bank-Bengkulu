<?php

use App\Http\Controllers\AgenPemasaranController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardCOntroller;
use App\Http\Controllers\InstitusiController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\KetuaKoperasiController;
use App\Http\Controllers\PejabatBerwenangController;
use App\Http\Controllers\SahamInstitusiController;
use App\Http\Controllers\SahamInvestorController;
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
    return redirect()->route('login');
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

    Route::controller(KetuaKoperasiController::class)->group(function () {
        Route::get('/ketua_koperasi', 'index')->name('ketuaKoperasi');
        Route::get('/ketua_koperasi/create', 'create')->name('ketuaKoperasi.create');
        Route::post('/ketua_koperasi', 'store')->name('ketuaKoperasi.store');
        Route::get('/ketua_koperasi/{ketuaKoperasi}/edit', 'edit')->name('ketuaKoperasi.edit');
        Route::patch('/ketua_koperasi/update', 'update')->name('ketuaKoperasi.update');
        Route::delete('/ketua_koperasi/{ketuaKoperasi}/delete', 'delete')->name('ketuaKoperasi.delete');
    });

    Route::controller(AgenPemasaranController::class)->group(function () {
        Route::get('/agen_pemasaran', 'index')->name('agenPemasaran');
        Route::get('/agen_pemasaran/create', 'create')->name('agenPemasaran.create');
        Route::post('/agen_pemasaran', 'store')->name('agenPemasaran.store');
        Route::get('/agen_pemasaran/{agenPemasaran}/edit', 'edit')->name('agenPemasaran.edit');
        Route::patch('/agen_pemasaran/update', 'update')->name('agenPemasaran.update');
        Route::delete('/agen_pemasaran/{agenPemasaran}/delete', 'delete')->name('agenPemasaran.delete');
    });

    Route::controller(InvestorController::class)->group(function () {
        Route::get('/investor', 'index')->name('investor');
        Route::get('/investor/create', 'create')->name('investor.create');
        Route::post('/investor', 'store')->name('investor.store');
        Route::get('/investor/{investor}/edit', 'edit')->name('investor.edit');
        Route::patch('/investor/{investor}/update', 'update')->name('investor.update');
        Route::delete('/investor/{investor}/delete', 'delete')->name('investor.delete');
        Route::get('/investor/{investor}/cetak_perorangan', 'cetakPerorangan')->name('investor.cetak_perorangan');
    });

    Route::controller(SahamInvestorController::class)->group(function () {
        Route::get('/saham_investor', 'index')->name('sahamInvestor');
        Route::get('/saham_investor/create', 'create')->name('sahamInvestor.create');
        Route::post('/saham_investor', 'store')->name('sahamInvestor.store');
        Route::get('/saham_investor/{sahamInvestor}/edit', 'edit')->name('sahamInvestor.edit');
        Route::patch('/saham_investor/update', 'update')->name('sahamInvestor.update');
        Route::delete('/saham_investor/{sahamInvestor}/delete', 'delete')->name('sahamInvestor.delete');
        Route::get('/saham_investor/cari_investor', 'cariInvestor')->name('sahamInvestor.cari_investor');
        Route::get('/saham_investor/{sahamInvestor}/cetak_sk3s', 'cetakSk3s')->name('sahamInvestor.cetak_sk3s');
        Route::get('/saham_investor/{sahamInvestor}/cetak_spmpkop', 'cetakSpmpkop')->name('sahamInvestor.cetak_spmpkop');
        Route::get('/saham_investor/{sahamInvestor}/alihkan', 'alihkan')->name('sahamInvestor.alihkan');
        Route::post('/saham_investor/{sahamInvestor}/alihkan_post', 'alihkanPost')->name('sahamInvestor.alihkan_post');
    });

    Route::controller(InstitusiController::class)->group(function () {
        Route::get('/institusi', 'index')->name('institusi');
        Route::get('/institusi/create', 'create')->name('institusi.create');
        Route::post('/institusi', 'store')->name('institusi.store');
        Route::get('/institusi/{institusi}/edit', 'edit')->name('institusi.edit');
        Route::patch('/institusi/{institusi}/update', 'update')->name('institusi.update');
        Route::delete('/institusi/{institusi}/delete', 'delete')->name('institusi.delete');
        Route::get('/institusi/{institusi}/cetak_perorangan', 'cetakPerorangan')->name('institusi.cetak_perorangan');
    });

    Route::controller(SahamInstitusiController::class)->group(function () {
        Route::get('/saham_institusi', 'index')->name('sahamInstitusi');
        Route::get('/saham_institusi/create', 'create')->name('sahamInstitusi.create');
        Route::post('/saham_institusi', 'store')->name('sahamInstitusi.store');
        Route::get('/saham_institusi/{sahamInstitusi}/edit', 'edit')->name('sahamInstitusi.edit');
        Route::patch('/saham_institusi/update', 'update')->name('sahamInstitusi.update');
        Route::delete('/saham_institusi/{sahamInstitusi}/delete', 'delete')->name('sahamInstitusi.delete');
        Route::get('/saham_institusi/cari_investor', 'cariInvestor')->name('sahamInstitusi.cari_investor');
        Route::get('/saham_institusi/{sahamInstitusi}/cetak_sk3s', 'cetakSk3s')->name('sahamInstitusi.cetak_sk3s');
        Route::get('/saham_institusi/{sahamInstitusi}/cetak_spmpkop', 'cetakSpmpkop')->name('sahamInstitusi.cetak_spmpkop');
        Route::get('/saham_institusi/{sahamInstitusi}/alihkan', 'alihkan')->name('sahamInstitusi.alihkan');
        Route::post('/saham_institusi/{sahamInstitusi}/alihkan_post', 'alihkanPost')->name('sahamInstitusi.alihkan_post');
        Route::get('/saham_institusi/cari_institusi', 'cariInstitusi')->name('sahamInstitusi.cari_institusi');
    });
});
