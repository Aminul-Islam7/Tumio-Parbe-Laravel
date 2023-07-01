<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


// Homepage
Route::get('/', function () {
    return view('home');
})->name('home');

// Show Register Form
Route::get('/register', [UserController::class, 'registerPhone'])->name('register-phone');

// Send verification code and show verification view
Route::post('/verify', [UserController::class, 'verify'])->name('verify');

// Create New User
Route::post('/registration-form', [UserController::class, 'register'])->name('register');


// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login');
