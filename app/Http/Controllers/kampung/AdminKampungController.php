<?php

namespace App\Http\Controllers\kampung;

use App\Models\User;
use App\Models\Village;
use App\Models\VillageUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminKampungController extends Controller
{
    // Index
    public function index() {
        return view('kampung.index', [
            'title' => 'Dashboard Admin Kampung'
        ]);
    }
}
