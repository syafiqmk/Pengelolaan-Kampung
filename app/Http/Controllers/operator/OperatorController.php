<?php

namespace App\Http\Controllers\operator;

use App\Models\Village;
use Illuminate\Http\Request;
use App\Models\VillageOperator;
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
}
