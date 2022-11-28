<?php

namespace App\Http\Controllers\admin;

use App\Models\Village;
use Illuminate\Http\Request;
use App\Models\ComplaintCategory;
use App\Http\Controllers\Controller;

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

    // Kampung
    public function kampung() {
        return view("admin.kampung.index", [
            'title' => 'Data Kampung',
            'villages' => Village::orderBy('id', 'desc')->paginate(10),
            'count' => Village::all()->count()
        ]);
    }

    public function kampungWaiting() {
        return view("admin.kampung.waiting", [
            'title' => 'Data Kampung (Waiting)',
            'villages' => Village::where('status', '=', 'Waiting')->orderBy('id', 'desc')->paginate(10),
            'count' => Village::where('status', '=', 'Waiting')->count()
        ]);
    }

    public function kampungGranted()
    {
        return view("admin.kampung.granted", [
            'title' => 'Data Kampung (Granted)',
            'villages' => Village::where('status', '=', 'Granted')->orderBy('id', 'desc')->paginate(10),
            'count' => Village::where('status', '=', 'Granted')->count()
        ]);
    }

    public function detailKampung(Village $village) {
        return view('admin.kampung.detail', [
            'title' => 'Detail ' . $village->name,
            'village' => $village,
        ]);
    }

    public function grantKampung(Village $village) {
        $grant = $village->update([
            'status' => 'Granted'
        ]);

        if($grant) {
            return redirect()->route('admin.kampung')->with('success', 'Status Kampung berhasil diubah!');
        } else {
            return redirect()->route('admin.detailKampung', $village->id)->with('danger', 'Status Kampung gagal diubah!');
        }
    }
}
