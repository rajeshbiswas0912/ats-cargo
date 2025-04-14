<?php

use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [OrdersController::class, 'index'])->name('index');
        Route::get('create', [OrdersController::class, 'create'])->name('create');
    });

    Route::prefix('enquiry')->name('enquiry.')->group(function () {
        Route::get('/', [EnquiryController::class, 'index'])->name('index');
    });
});

require __DIR__ . '/auth.php';
