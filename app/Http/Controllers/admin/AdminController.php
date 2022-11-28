<?php

namespace App\Http\Controllers\admin;

use App\Models\Village;
use Illuminate\Http\Request;
use App\Models\ComplaintCategory;
use App\Http\Controllers\Controller;
use App\Models\User;
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

    // Operator
    public function operator() {
        return view('admin.operator.index', [
            'title' => 'Data Operator',
            'operators' => User::where('role', '=', 'Operator')->orderBy('id', 'desc')->paginate(10),
            'count' => User::where('role', '=', 'Operator')->count(),
        ]);
    }

    public function operatorWaiting() {
        return view('admin.operator.waiting', [
            'title' => 'Data Operator',
            'operators' => User::where('role', '=', 'Operator')->where('status', '=', 'Waiting')->orderBy('id', 'desc')->paginate(10),
            'count' => User::where('role', '=', 'Operator')->where('status', '=', 'Waiting')->count(),
        ]);
    }

    public function operatorGranted() {
        return view('admin.operator.granted', [
            'title' => 'Data Operator',
            'operators' => User::where('role', '=', 'Operator')->where('status', '=', 'Granted')->orderBy('id', 'desc')->paginate(10),
            'count' => User::where('role', '=', 'Operator')->where('status', '=', 'Granted')->count(),
        ]);
    }

    public function operatorDetail(User $operator) {
        return view('admin.operator.detail', [
            'title' => 'Detail ' . $operator->name,
            'operator' => $operator
        ]);
    }

    public function operatorGrant(User $operator) {
        $grant = $operator->update([
            'status' => 'Granted'
        ]);

        if($grant) {
            return redirect()->route('admin.operator')->with('success', 'Status Operator berhasil diubah!');
        } else {
            return redirect()->route('admin.operatorDetail', $operator->id)->with('danger', 'Status Operator gagal diubah!');
        }
    }
}
