<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;


Route::get('/', function () {
    return view('welcome');
});

//Route Untuk Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Route untuk AUTH
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    // Route lain yang memerlukan autentikasi
});

// routes/web.php
Route::middleware(['auth'])->group(function () {
    Route::resource('employees', EmployeeController::class);
});

Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
Route::resource('employees', EmployeeController::class);
