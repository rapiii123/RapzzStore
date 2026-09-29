<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\BannerController;

// MENU UTAMA (Dashboard)
Route::get('/', [GameController::class, 'index'])->name('dashboard');

// GAME (Top Up)
Route::get('/game/{id}', [GameController::class, 'show'])->name('game.show');

// TRANSAKSI
Route::get('/buy/{id}', [TransactionController::class, 'create'])->name('buy');
Route::post('/checkout', [TransactionController::class, 'process'])->name('checkout.process');
Route::get('/payment/{id}', [TransactionController::class, 'paymentProcessing'])->name('payment.processing');
Route::get('/payment/{id}/check', [TransactionController::class, 'checkPaymentStatus'])->name('payment.check');
Route::get('/transaction/{id}', [TransactionController::class, 'show'])->name('transaction.show');

// RIWAYAT TOPUP
Route::get('/riwayat', [TransactionController::class, 'index'])->name('riwayat');

// CEK PESANAN
Route::get('/cekpesanan', function () {
    return view('cekpesanan');
})->name('cekpesanan');

// SYARAT & KETENTUAN
Route::get('/terms', function () {
    return view('terms');
})->name('terms');

// AKUN
Route::get('/sign-in', function () {
    return view('sign-in');
})->name('sign-in');

Route::get('/sign-up', function () {
    return view('sign-up');
})->name('sign-up');

// CALCULATOR
Route::get('/calculator', function () {
    return view('calculator');
})->name('calculator');

// Dukungan 
Route::get('/support', function () {
    return view('support');
})->name('support');

// ADMIN - BANNER MANAGEMENT
Route::prefix('admin')->group(function () {
    Route::get('/banners', [BannerController::class, 'index'])->name('admin.banners.index');
    Route::post('/banners', [BannerController::class, 'store'])->name('admin.banners.store');
    Route::get('/banners/{id}/edit', [BannerController::class, 'edit'])->name('admin.banners.edit');
    Route::patch('/banners/{id}', [BannerController::class, 'update'])->name('admin.banners.update');
    Route::patch('/banners/{id}/toggle', [BannerController::class, 'toggle'])->name('admin.banners.toggle');
    Route::delete('/banners/{id}', [BannerController::class, 'destroy'])->name('admin.banners.destroy');
});