<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LayananController;

Route::get('/', function () {
    return view('layouts.app');
});

// Menampilkan dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Menampilkan semua layanan
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');

// Menampilkan form untuk membuat layanan baru
Route::get('/layanan/create', [LayananController::class, 'create'])->name('layanan.create');

// Menyimpan data layanan yang baru dibuat
Route::post('/layanan', [LayananController::class, 'store'])->name('layanan.store');

// Menampilkan form untuk mengedit layanan
Route::get('/layanan/{id}/edit', [LayananController::class, 'edit'])->name('layanan.edit');

// Menyimpan data layanan yang telah diubah
Route::put('/layanan/{id}', [LayananController::class, 'update'])->name('layanan.update');

// Menghapus data layanan
Route::delete('/layanan/{id}', [LayananController::class, 'destroy'])->name('layanan.destroy');

// Rute untuk cetak PDF
Route::get('/layanan/cetak', [LayananController::class, 'cetakLaporan'])->name('layanan.cetakLaporan');
