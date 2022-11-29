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

    public function forbidden() {
        return view('403', [
            'title' => "403 | Forbidden"
        ]);
    }

}
