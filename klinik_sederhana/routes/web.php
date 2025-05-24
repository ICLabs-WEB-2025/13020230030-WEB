<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('pasien', App\Http\Controllers\PasienController::class)->middleware('auth');
Route::resource('dokter', App\Http\Controllers\DokterController::class)->middleware('auth');
Route::resource('obat', App\Http\Controllers\ObatController::class)->middleware('auth');
Route::resource('kunjungan', App\Http\Controllers\KunjunganController::class)->middleware('auth');
Route::resource('resep', App\Http\Controllers\ResepController::class)->middleware('auth');

// Contoh route untuk statistik (jika ada)
// Route::get('/statistik', [App\Http\Controllers\StatistikController::class, 'index'])->middleware('auth')->name('statistik.index');

Route::get('/pasien/{pasien}/qrcode', [App\Http\Controllers\PasienController::class, 'qrcode'])->middleware('auth')->name('pasien.qrcode');
