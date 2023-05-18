<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('movies.index');

Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/movies', [ViewController::class, 'index'])->name('movies.index');
    Route::get('/movies/{id}', [ViewController::class, 'show'])->name('movies.show');

    Route::group(['middleware' => 'web'], function () {
        Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
        Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
        Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
        Route::post('/purchase', [CartController::class, 'purchase'])->name('purchase');
        Route::get('/purchase/success', [CartController::class, 'purchaseSuccess'])->name('purchase.success');
        Route::get('/purchase-history', [CartController::class, 'purchaseHistory'])->name('purchase.history');

    });

});

require __DIR__.'/auth.php';
