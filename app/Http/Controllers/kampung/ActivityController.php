<?php

namespace App\Http\Controllers\kampung;

use App\Models\Village;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $activities = Activity::where('village_id', '=', (Village::where('admin_id', '=', auth()->user()->id)->firstOrFail()));
        $activities = Activity::where('village_id', '=', auth()->user()->village_admin->id)->where('date', '>=', date('Y-m-d'))->orderBy('date', 'DESC');

        return view('kampung.activity.index', [
            'title' => 'Kegiatan',
            'activities' => $activities->paginate(10),
            'count' => $activities->count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kampung.activity.create', [
            'title' => 'Tambah Kegiatan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'date' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'required'
        ]);

        $create = Activity::create([
            'title' => ucwords($validate['title']),
            'description' => $validate['description'],
            'latitude' => $validate['latitude'],
            'longitude' => $validate['longitude'],
            'date' => $validate['date'],
            'village_id' => auth()->user()->village_admin->id
        ]);

        if($create) {
            return redirect()->route('kampung.activity.index')->with('success', 'Kegiatan berhasil ditambah!');
        } else {
            return redirect()->route('kampung.activity.index')->with('danger', 'Kegiatan gagal ditambah!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        return view('kampung.activity.detail', [
            'title' => $activity->title,
            'activity' => $activity
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        return view('kampung.activity.edit', [
            'title' => 'Edit : ' . $activity->title,
            'activity' => $activity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        $validate = $request->validate([
            'title' => 'required',
            'date' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'required'
        ]);

        $create = $activity->update([
            'title' => ucwords($validate['title']),
            'description' => $validate['description'],
            'latitude' => $validate['latitude'],
            'longitude' => $validate['longitude'],
            'date' => $validate['date']
        ]);

        if ($create) {
            return redirect()->route('kampung.activity.show', $activity->id)->with('success', 'Kegiatan berhasil diedit!');
        } else {
            return redirect()->route('kampung.activity.show', $activity->id)->with('danger', 'Kegiatan gagal diedit!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $delete = $activity->delete();

        if($delete) {
            return redirect()->route('kampung.activity.index')->with('success', 'Kegiatan berhasil dihapus!');
        } else {
            return redirect()->route('kampung.activity.show', $activity->id)->with('danger', 'Kegiatan gagal dihapus!');
        }
    }
}
