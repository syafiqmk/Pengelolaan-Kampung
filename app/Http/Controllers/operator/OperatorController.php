<?php

namespace App\Http\Controllers\operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    // index
    public function index() {
        return view('operator.index', [
            'title' => 'Operator Dashboard'
        ]);
    }
}
