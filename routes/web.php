<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MonthlySummariesController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [RegisterController::class, 'register']);

// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::middleware('auth')->group(function () {

//     // Halaman notifikasi verifikasi email (jika belum verified)
//     Route::get('/email/verify', function () {
//         return view('auth.verify-email');
//     })->name('verification.notice');

//     // Link verifikasi yang dikirim via email
//     Route::get('/email/verify/{id}/{hash}', VerifyEmailController::class)
//         ->middleware(['auth', 'signed'])
//         ->name('verification.verify');

//     // Kirim ulang email verifikasi
//     // Resend link verifikasi
//     Route::post('/email/verification-notification', function (Request $request) {
//         $request->user()->sendEmailVerificationNotification();
//         return back()->with('status', 'verification-link-sent');
//     })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
// });

// Route::middleware(['auth', 'verified'])->group(function () {});


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