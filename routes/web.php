<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;


Route::get('/', [OrderController::class, 'showEvent'])->name('event.detail');
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('placeOrder');
// Route::get('/upload-payment/{id}', [OrderController::class, 'uploadPayment'])->name('uploadPayment');
// Route::post('/store-payment/{id}', [OrderController::class, 'storePayment'])->name('storePayment');
// Route untuk admin menampilkan pesanan
Route::get('/admin/orders', [OrderController::class, 'showOrders'])->name('admin.orders');
// Route untuk melihat bukti pembayaran
Route::get('/admin/orders/{id}', [OrderController::class, 'showOrder'])->name('admin.showOrder');

Route::get('/upload-payment/{buyer_name}', [OrderController::class, 'uploadPayment'])->name('uploadPayment');
Route::post('/store-payment/{buyer_name}', [OrderController::class, 'storePayment'])->name('storePayment');
Route::get('/success', function () {
    return view('success');
})->name('success');
