<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function welcome() {
        return view("welcome", [
            'title' => "Aplikasi Pengelolaan Kampung"
        ]);
    }

    public function login() {
        return view("auth.login", [
            "title" => "Login"
        ]);
    }
}
