<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ComplaintCategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Index
    public function index() {
        return view("admin.index", [
            'title' => 'Admin Dashboard'
        ]);
    }

    // Complain Category
    public function category() {
        return response()->json([
            'categories' => ComplaintCategory::all(),
            'count' => ComplaintCategory::all()->count()
        ]);
    }
}
