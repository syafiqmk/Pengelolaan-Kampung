<?php

namespace App\Http\Controllers\kampung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminKampungController extends Controller
{
    // Index
    public function index() {
        return view('kampung.index', [
            'title' => 'Dashboard Admin Kampung'
        ]);
    }
}
