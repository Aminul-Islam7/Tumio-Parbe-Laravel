<?php

namespace App\Http\Controllers;

use App\Models\Verification;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show Register Form
    public function register() {
        return view('users.register_phone')->with('title', 'Register');
    }

    // Verify Phone Number
    public function verify(Request $request) {
        $request->validate(
            [
                'phone' => ['required', 'regex:/^01[3-9]\d{8}$/']
            ],
            [
                'phone' => ['ফোন নম্বরটি সঠিক নয়']
            ]
        );

        $code = rand(10000, 99999);

        $verification = new Verification();
        $verification->phone = $request->phone;
        $verification->code = $code;
        $verification->save();

        return view('users.register_verify')->render();
        
    }

    // Show Login Form
    public function login() {
        return view('users.login')->with('title', 'Student Login');
    }
}
