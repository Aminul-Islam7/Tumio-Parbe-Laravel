<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


// Homepage
Route::get('/', function () {
    return view('home');
})->name('home');

// Show Register Form
Route::get('/register', [UserController::class, 'register'])->name('register');

// Create New User
Route::post('/users', [UserController::class, 'store']);


// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login');

// Send verification code
Route::post('/verify', [UserController::class, 'verify'])->name('verify');