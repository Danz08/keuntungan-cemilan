<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TargetController;

Route::get('/', [LaporanController::class, 'index'])->name('dashboard');

Route::resource('produk', ProdukController::class);
Route::resource('penjualan', PenjualanController::class);
Route::resource('pembelian', PembelianController::class);
Route::resource('laporan', LaporanController::class)->only(['index']);
Route::resource('target', TargetController::class)->except(['show']);
