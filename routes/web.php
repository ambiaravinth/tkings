<?php

use App\Http\Middleware\CheckAuthRedirect;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentsController;

// Register
Route::get('register', [AuthController::class, 'register']);
Route::post('save-register', [AuthController::class, 'save_register']);

// Authendication
Route::get('login', [AuthController::class, 'login'])->middleware(CheckAuthRedirect::class);
Route::post('loginsubmit', [AuthController::class, 'loginsubmit']);
Route::post('logout', [AuthController::class, 'logout']);


Route::middleware([CheckAuthRedirect::class])->group(function () {
    // Home Dashboard
    Route::get('/', [HomeController::class, 'index']);

    // Receipts
    Route::get('receipts', [HomeController::class, 'receipts']);

    // Pay
    Route::get('pay', [HomeController::class, 'pay']);

    // Payments
    Route::get('payments', [HomeController::class, 'payments']);

    // Profile
    Route::get('profile', [HomeController::class, 'profile']);
    Route::post('dbupload', [HomeController::class, 'dbupload']);
    Route::post('updatebasicprofile', [HomeController::class, 'updatebasicprofile']);
    Route::post('changepassword', [HomeController::class, 'changepassword']);

    // Settings
    Route::get('settings', [HomeController::class, 'settings']);
    Route::post('themechange', [HomeController::class, 'themechange']);

    // Add Receipts
    Route::post('addreceipt', [PaymentsController::class, 'addpayment']);
    Route::get('accept-payment/{id}', [PaymentsController::class, 'acceptpayment']);
    Route::get('reject-payment/{id}', [PaymentsController::class, 'rejectpayment']);
});
