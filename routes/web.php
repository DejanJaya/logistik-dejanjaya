<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BookController;
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

    Route::get('/book',[BookController::class,'index'])->name('book');
    Route::get('/book/create',[BookController::class,'create'])->name('book.create');
    Route::post('/book/store',[BookController::class,'store'])->name('book.store');
    Route::get('/book/edit/{kd_buku}', [BookController::class, 'edit'])->name('book.edit');
    Route::post('/book/update', [BookController::class, 'update'])->name('book.update');
    Route::get('/book/delete/{kd_buku}', [BookController::class, 'delete'])->name('book.delete');
    
    Route::get('/get-stock/{kd_barang}', [BarangMasukController::class, 'getStock']);
    Route::get('/barangmasuk', [BarangMasukController::class, 'index'])->name('barangmasuk');    
    Route::get('/barangmasuk/create', [BarangMasukController::class, 'create'])->name('barangmasuk.create');
    Route::post('/barangmasuk/store', [BarangMasukController::class, 'store'])->name('barangmasuk.store');

    Route::get('/get-stock-keluar/{kd_barang}', [BarangKeluarController::class, 'getStockKeluar']);
    Route::get('/barangkeluar', [BarangKeluarController::class, 'index'])->name('barangkeluar');    
    Route::get('/barangkeluar/create', [BarangKeluarController::class, 'create'])->name('barangkeluar.create');
    Route::post('/barangkeluar/store', [BarangKeluarController::class, 'store'])->name('barangkeluar.store');

    Route::group(["prefix" => "latihan"], function(){
        // KODE KODE ROUTE SEBELUMNYA
        // ......
        // Tambahkan ini
        Route::view("layouts", "child");
    });