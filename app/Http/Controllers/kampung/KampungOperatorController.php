<?php

namespace App\Http\Controllers\kampung;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\VillageOperator;
use App\Http\Controllers\Controller;

class KampungOperatorController extends Controller
{
    // Index
    public function index() {

        $operators = User::where('role', '=', 'Operator')->whereIn('id', VillageOperator::where('village_id', '=', auth()->user()->village_admin->id)->select('operator_id'))->orderBy('id', 'DESC');

        return view('kampung.operator.index', [
            'title' => 'Operator Kampung',
            'operators' => $operators->paginate(10),
            'count' => $operators->count()
        ]);
    }

    // Detail
    public function detail(User $operator) {
        return view('kampung.operator.detail', [
            'title' => $operator->name,
            'operator' => $operator
        ]);
    }

    // Tambah
    public function tambah(Request $request) {
        if($request->has('search')) {
            $operators = User::where('status', '=', 'Granted')->where('role', '=', 'Operator')->where('name', 'LIKE', '%'.$request['search'].'%')->whereNotIn('id', VillageOperator::where('village_id', '=', auth()->user()->village_admin->id)->select('operator_id'))->orderBy('id', 'DESC');
        } else {
            $operators = User::where('status', '=', 'Granted')->where('role', '=', 'Operator')->whereNotIn('id', VillageOperator::where('village_id', '=', auth()->user()->village_admin->id)->select('operator_id'))->orderBy('id', 'DESC');
        }

        return view('kampung.operator.tambah', [
            'title' => 'Tambah Operator',
            'operators' => $operators->paginate(10),
            'count' => $operators->count()
        ]);
    }

    public function tambahDetail(User $operator) {
        return view('kampung.operator.tambahDetail', [
            'title' => $operator->name,
            'operator' => $operator
        ]);
    }

    public function tambahProcess(User $operator) {
        $create = VillageOperator::create([
            'operator_id' => $operator->id,
            'village_id' => auth()->user()->village_admin->id
        ]);

        if($create) {
            return redirect()->route('kampung.operator.index')->with('success', 'Operator berhasil ditambah!');
        } else {
            return redirect()->back()->with('danger', 'Operator gagal ditambah!');
        }
    }
}
