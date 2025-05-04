<?php

use App\Http\Controllers\DashboardController;
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

Route::get('/enquiry', [EnquiryController::class, 'create'])->name('enquiry.create');
Route::get('/tracking', [EnquiryController::class, 'tracking'])->name('enquiry.tracking');
Route::post('store-enquiry', [EnquiryController::class, 'store'])->name('enquiry.store');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [OrdersController::class, 'index'])->name('index');
        Route::get('create', [OrdersController::class, 'create'])->name('create');
        Route::get('/{tracking_no}', [OrdersController::class, 'show'])->name('show');
        Route::get('/edit/{order}', [OrdersController::class, 'edit'])->name('edit');
        Route::get('delete/{order_id}', [OrdersController::class, 'delete'])->name('delete');
        Route::post('store', [OrdersController::class, 'store'])->name('store');
        Route::post('store-location/{order_id}', [OrdersController::class, 'store_location'])->name('store-location');
        Route::post('update/{order}', [OrdersController::class, 'update'])->name('update');
        Route::post('delivered/{order}', [OrdersController::class, 'delivered'])->name('delivered');
    });

    Route::prefix('enquiries')->name('enquiries.')->group(function () {
        Route::get('/', [EnquiryController::class, 'index'])->name('index');
        Route::get('details/{id}', [EnquiryController::class, 'details'])->name('details');
        Route::post('create-order', [EnquiryController::class, 'create_order'])->name('create-order');
    });
});

require __DIR__ . '/auth.php';