<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show Register Form
    public function register() {
        return view('users.register_phone')->with('title', 'Register');
    }

    // Show Login Form
    public function login() {
        return view('users.login')->with('title', 'Student Login');
    }
}
