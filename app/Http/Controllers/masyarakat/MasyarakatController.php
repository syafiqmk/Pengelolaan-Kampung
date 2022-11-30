<?php

namespace App\Http\Controllers\masyarakat;

use App\Models\Information;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MasyarakatController extends Controller
{
    public function index() {
        return view('masyarakat.index', [
            'title' => 'Dashboard Masyarakat'
        ]);
    }

    // Pengumuman
    public function pengumuman() {
        $announcements = Announcement::where('village_id', '=', auth()->user()->village_user->village_id)->orderBy('id', 'DESC');
        
        return view('masyarakat.pengumuman.index', [
            'title' => 'Pengumuman',
            'announcements' => $announcements->paginate(10),
            'count' => $announcements->count()
        ]);
    }

    public function detailPengumuman(Announcement $pengumuman) {
        return view('masyarakat.pengumuman.detail', [
            'title' => $pengumuman->title,
            'announcement' => $pengumuman
        ]);
    }

    // Informasi
    public function information() {
        $informations = Information::where('village_id', '=', auth()->user()->village_user->village_id)->orderBy('id', 'DESC');

        return view('masyarakat.informasi.index', [
            'title' => 'Informasi',
            'informations' => $informations->paginate(10),
            'count' => $informations->count()
        ]);
    }

    public function detailInformation(Information $information) {
        return view('masyarakat.informasi.detail', [
            'title' => $information->title,
            'information' => $information
        ]);
    }
}
