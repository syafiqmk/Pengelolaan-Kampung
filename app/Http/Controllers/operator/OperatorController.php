<?php

namespace App\Http\Controllers\operator;

use App\Models\Village;
use App\Models\Emergency;
use Illuminate\Http\Request;
use App\Models\VillageOperator;
use App\Models\EmergencyResponse;
use App\Http\Controllers\Controller;

class OperatorController extends Controller
{
    // index
    public function index() {
        return view('operator.index', [
            'title' => 'Operator Dashboard'
        ]);
    }

    // Kampung
    public function kampung() {

        $villages = Village::whereIn('id', VillageOperator::where('operator_id', '=', auth()->user()->id)->select('village_id'))->orderBy('id', 'DESC');

        return view('operator.kampung.index', [
            'title' => 'Kampung yang Dilayani',
            'villages' => $villages->paginate(10),
            'count' => $villages->count()
        ]);
    }

    public function kampungDetail(Village $village) {
        return view('operator.kampung.detail', [
            'title' => $village->name,
            'village' => $village
        ]);
    }

    // Private
    public function private() {

        $emergencies = Emergency::whereIn('village_id', VillageOperator::where('operator_id', '=', auth()->user()->id)->select('village_id'))->where('status', '=', 'Dilaporkan')->where('access', '=', 'Private')->orderBy('id', 'DESC');

        return view('operator.private.index', [
            'title' => 'Laporan Private',
            'emergencies' => $emergencies->paginate(10),
            'count' => $emergencies->count()
        ]);
    }

    public function privateProses() {

        $emergencies = Emergency::whereIn('village_id', VillageOperator::where('operator_id', '=', auth()->user()->id)->select('village_id'))->where('status', '=', 'Diproses')->where('access', '=', 'Private')->where('operator_id', '=', auth()->user()->id)->orderBy('id', 'DESC');

        return view('operator.private.diproses', [
            'title' => 'Laporan Private',
            'emergencies' => $emergencies->paginate(10),
            'count' => $emergencies->count()
        ]);
    }

    public function privateSelesai() {

        $emergencies = Emergency::whereIn('village_id', VillageOperator::where('operator_id', '=', auth()->user()->id)->select('village_id'))->where('status', '=', 'Selesai')->where('access', '=', 'Private')->where('operator_id', '=', auth()->user()->id)->orderBy('id', 'DESC');

        return view('operator.private.selesai', [
            'title' => 'Laporan Private',
            'emergencies' => $emergencies->paginate(10),
            'count' => $emergencies->count()
        ]);
    }

    public function privateDetail(Emergency $darurat) {
        return view('operator.private.detail', [
            'title' => 'Detail Laporan',
            'emergency' => $darurat,
            'responses' => EmergencyResponse::where('emergency_id', '=', $darurat->id)->orderBy('id', 'DESC')->get()
        ]);
    }

    public function proses(Emergency $darurat) {
        $update = $darurat->update([
            'status' => 'Diproses',
            'operator_id' => auth()->user()->id
        ]);

        $create = EmergencyResponse::create([
            'description' => 'Diproses oleh ' . auth()->user()->name,
            'emergency_id' => $darurat->id
        ]);

        if($update && $create) {
            return redirect()->route('operator.privateDetail', $darurat->id)->with('success', 'Status berhasil diubah!');
        }
    }

    public function response(Request $request) {
        $validate = $request->validate([
            'emergency_id' => 'required',
            'description' => 'required'
        ]);

        $create = EmergencyResponse::create([
            'description' => $validate['description'],
            'emergency_id' => $validate['emergency_id']
        ]);

        if($create) {
            return redirect()->back()->with('success', 'Proses berhasil ditambah!');
        } else {
            return redirect()->back()->with('danger', 'Proses gagal ditambah!');
        }
    }

    public function selesai(Emergency $darurat) {
        $update = $darurat->update([
            'status' => 'Selesai'
        ]);

        $create = EmergencyResponse::create([
            'description' => 'Laporan Selesai',
            'emergency_id' => $darurat->id
        ]);

        if($update) {
            return redirect()->back()->with('success', 'Laporan berhasil diselesaikan!');
        } else {
            return redirect()->back()->with('danger', 'Laporan gagal diselesaikan!');
        }
    }
}
