<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

// Guest
Route::get('/', [HomeController::class, 'homePage']);
Route::get('/home', [HomeController::class, 'homePage'])->name('home');

// Auth
Route::get('/get-login-form', [AuthController::class, 'getLoginForm'])->name('getLogin');
Route::get('/get-register-form', [AuthController::class, 'getRegisterForm'])->name('getRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    // User
    Route::get('/last-five-transactions', [UserController::class, 'lastFiveTransactions'])->name('lastFiveTransactions');
    Route::get('/all-accounts', [UserController::class, 'getAccounts'])->name('getAccounts');

    // Account
    Route::post('/account-balance', [AccountController::class, 'getAccountBalance'])->name('getAccountBalance');
    Route::post('/account-withdraw', [AccountController::class, 'accountWithdraw'])->name('accountWithdraw');
});