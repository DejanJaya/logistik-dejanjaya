<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use Illuminate\Support\Facades\Route;

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

    Route::get('/', [BarangController::class, 'index'])->name('barang');    

    Route::get('/get-stock/{kd_barang}', [BarangMasukController::class, 'getStock']);
    Route::get('/barangmasuk', [BarangMasukController::class, 'index'])->name('barangmasuk');    
    Route::get('/barangmasuk/create', [BarangMasukController::class, 'create'])->name('barangmasuk.create');
    Route::post('/barangmasuk/store', [BarangMasukController::class, 'store'])->name('barangmasuk.store');

    Route::get('/get-stock-keluar/{kd_barang}', [BarangKeluarController::class, 'getStockKeluar']);
    Route::get('/barangkeluar', [BarangKeluarController::class, 'index'])->name('barangkeluar');    
    Route::get('/barangkeluar/create', [BarangKeluarController::class, 'create'])->name('barangkeluar.create');
    Route::post('/barangkeluar/store', [BarangKeluarController::class, 'store'])->name('barangkeluar.store');
