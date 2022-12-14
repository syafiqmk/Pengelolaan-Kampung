<?php

namespace App\Http\Controllers\masyarakat;

use App\Models\Emergency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MasyarakatDaruratController extends Controller
{
    // create
    public function create() {
        return view('masyarakat.darurat.create', [
            'title' => 'Buat Laporan Darurat'
        ]);
    }

    public function createProcess(Request $request) {
        $validate = $request->validate([
            'type' => 'required',
            'access' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'required'
        ]);

        $create = Emergency::create([
            'description' => $validate['description'],
            'latitude' => $validate['latitude'],
            'longitude' => $validate['longitude'],
            'type' => $validate['type'],
            'access' => $validate['access'],
            'status' => 'Dilaporkan',
            'user_id' => auth()->user()->id,
            'village_id' => auth()->user()->village_user->village_id
        ]);

        if($create) {
            return redirect()->route('masyarakat.darurat.history')->with('success', 'Laporan Darurat berhasil dibuat!');
        }
    }

    // History
    public function history() {
        $emergencies = Emergency::where('user_id', '=', auth()->user()->id)->where('status', '=', 'Dilaporkan')->orderBy('id', 'DESC');

        return view('masyarakat.darurat.history', [
            'title' => 'Laporan Darurat',
            'emergencies' => $emergencies->paginate(10),
            'count' => $emergencies->count()
        ]);
    }
}
