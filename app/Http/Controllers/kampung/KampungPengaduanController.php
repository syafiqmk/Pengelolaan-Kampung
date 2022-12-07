<?php

namespace App\Http\Controllers\kampung;

use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Models\ComplaintCategory;
use App\Http\Controllers\Controller;

class KampungPengaduanController extends Controller
{
    public function index() {
        return view('kampung.pengaduan.index', [
            'title' => 'Pengaduan',
            'categories' => ComplaintCategory::all(),
            'complaints' => Complaint::all(),
        ]);
    }

    public function category(ComplaintCategory $category) {

        $complaints = Complaint::where('category_id', '=', $category->id)->where('village_id', '=', auth()->user()->village_admin->id)->orderBy('id', 'DESC');

        return view('kampung.pengaduan.category', [
            'title' => $category->category,
            'category' => $category,
            'complaints' => $complaints->paginate(10),
            'count' => $complaints->count(),
        ]);
    }

    public function detail(Complaint $complaint) {
        return view('kampung.pengaduan.detail', [
            'title' => 'Detail Pengaduan',
            'complaint' => $complaint
        ]);
    }
}
