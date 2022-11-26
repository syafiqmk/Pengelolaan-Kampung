<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Login
    public function login() {
        return view("auth.login",[
            "title" => "Login",
        ]);
    }
}
