<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Login
    public function login() {
        return view("auth.login",[
            "title" => "Login",
        ]);
    }

    public function loginProcess(Request $request) {
        $validate = $request->validate([
            "email" => "required|email:dns",
            "password" => "required"
        ]);

        if(Auth::attempt($validate)) {
            $request->session()->regenerate();
            $role = Auth()->user()->role;
        }
    }
}
