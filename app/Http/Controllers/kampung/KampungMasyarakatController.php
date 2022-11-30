<?php

namespace App\Http\Controllers\kampung;

use App\Models\User;
use App\Models\Village;
use App\Models\VillageUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KampungMasyarakatController extends Controller
{
    public function index() {
        $villageUser = VillageUser::where('village_id', '=', (Village::where('admin_id', '=', auth()->user()->id)->firstOrFail()->id));
        $users = User::whereIn('id', $villageUser->select('user_id'));
        return view('kampung.masyarakat.index', [
            'title' => 'Masyarakat',
            'users' => $users->paginate(10),
            'count' => $users->count()
        ]);
    }

    public function waiting() {
        $villageUser = VillageUser::where('village_id', '=', (Village::where('admin_id', '=', auth()->user()->id)->firstOrFail()->id));
        $users = User::whereIn('id', $villageUser->select('user_id'))->where('status', '=', 'Waiting');
        return view('kampung.masyarakat.waiting', [
            'title' => 'Masyarakat',
            'users' => $users->paginate(10),
            'count' => $users->count()
        ]);
    }

    public function granted() {
        $villageUser = VillageUser::where('village_id', '=', (Village::where('admin_id', '=', auth()->user()->id)->firstOrFail()->id));
        $users = User::whereIn('id', $villageUser->select('user_id'))->where('status', '=', 'Granted');
        return view('kampung.masyarakat.granted', [
            'title' => 'Masyarakat',
            'users' => $users->paginate(10),
            'count' => $users->count()
        ]);
    }

    public function detail(User $masyarakat) {
        return view('kampung.masyarakat.detail', [
            'title' => 'Detail Masyarakat',
            'user' => $masyarakat
        ]);
    }

    public function grant(User $masyarakat) {
        $update = $masyarakat->update([
            'status' => 'Granted'
        ]);
        
        if($update) {
            return redirect()->route('kampung.masyarakat.detail', $masyarakat->id)->with('success', 'Status berhasil diubah!');
        } else {
            return redirect()->route('kampung.masyarakat.detail', $masyarakat->id)->with('danger', 'Status gagal diubah!');
        }
    }
}
