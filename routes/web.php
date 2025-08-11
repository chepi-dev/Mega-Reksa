<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MonthlySummariesController;
use App\Http\Controllers\TransaksiController;
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
    return view('welcome');
});

route::get('/dashboard', function () {
    return view('dashboard');
});

route::prefix('customer')->name('Customer.')->group(function () {
    route::get('/', [CustomerController::class, 'index'])->name('index');
    route::get('/create', [CustomerController::class, 'create'])->name('create');
    route::post('/', [CustomerController::class, 'store'])->name('store');
    route::get('/{customer}/edit', [CustomerController::class, 'edit'])->name('edit');
    route::put('/{customer}', [CustomerController::class, 'update'])->name('update');
    route::delete('/{customer}', [CustomerController::class, 'destroy'])->name('destroy');
});

route::prefix('transaksi')->name('Transaksi.')->group(function () {
    route::get('/', [TransaksiController::class, 'index'])->name('index');
    route::get('/create', [TransaksiController::class, 'create'])->name('create');
    route::post('/', [TransaksiController::class, 'store'])->name('store');
    route::get('/{transaksi}/edit', [TransaksiController::class, 'edit'])->name('edit');
    route::put('/{transaksi}', [TransaksiController::class, 'update'])->name('update');
    route::delete('/{transaksi}', [TransaksiController::class, 'destroy'])->name('destroy');
});

route::prefix('summaries')->name('Summaries.')->group(function () {
    route::get('/', [MonthlySummariesController::class, 'index'])->name('index');
    Route::get('/show/{customer_id}', [MonthlySummariesController::class, 'show'])->name('show');
    Route::post('/generate', [MonthlySummariesController::class, 'generate']);
    // Generate semua customer (bulk)
    Route::post('/generate-all', [MonthlySummariesController::class, 'generateAll']);
});

// Di routes/web.php
Route::prefix('invoice')->name('Invoice.')->group(function () {
    Route::get('/', [InvoiceController::class, 'index'])->name('index');
    Route::get('/{customer}/{month}', [InvoiceController::class, 'show'])->name('show');
});