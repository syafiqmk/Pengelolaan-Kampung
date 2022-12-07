<?php

namespace App\Http\Controllers\masyarakat;

use App\Models\Complaint;
use App\Models\Information;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ComplaintCategory;

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

    // Pengaduan
    public function pengaduan() {
        $complaints = Complaint::where('user_id', '=', auth()->user()->id)->orderBy('id', 'DESC');

        return view('masyarakat.pengaduan.index', [
            'title' => 'Pengaduan Masyarakat',
            'complaints' => $complaints->paginate(10),
            'count' => $complaints->count()
        ]);
    }

    public function buatPengaduan() {
        return view('masyarakat.pengaduan.create', [
            'title' => 'Buat aduan baru',
            'categories' => ComplaintCategory::all(),
        ]);
    }

    public function buatPengaduanProcess(Request $request) {
        $validate = $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);

        $create = Complaint::create([
            'description' => $validate['description'],
            'latitude' => $validate['latitude'],
            'longitude' => $validate['longitude'],
            'category_id' => $validate['category'],
            'user_id' => auth()->user()->id,
            'village_id' => auth()->user()->village_user->village_id
        ]);

        if($create) {
            return redirect()->route('masyarakat.pengaduan.index')->with('success', 'Aduan berhasil dibuat!');
        } else {
            return redirect()->route('masyarakat.pengaduan.index')->with('danger', 'Aduan gagal dibuat!');
        }
    }

    public function pengaduanDetail(Complaint $complaint) {
        return view('masyarakat.pengaduan.detail', [
            'title' => 'Detail Pengaduan',
            'complaint' => $complaint
        ]);
    }
}
