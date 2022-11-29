<?php

namespace App\Http\Controllers\kampung;

use App\Models\Village;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $village = Village::where('admin_id', '=', auth()->user()->id)->firstOrFail();
        return view('kampung.pengumuman.index', [
            'title' => 'Pengumuman',
            'announcements' => Announcement::where('village_id', '=', $village->id)->get(),
            'count' => Announcement::where('village_id', '=', $village->id)->count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kampung.pengumuman.create', [
            'title' => 'Tambah Pengumuman'
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
        $village = Village::where('admin_id', '=', auth()->user()->id)->firstOrFail();

        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $create = Announcement::create([
            'title' => ucwords($validate['title']),
            'description' => $validate['description'],
            'village_id' => $village->id
        ]);

        if($create) {
            return redirect()->route('kampung.pengumuman.index')->with('success', 'Pengumuman berhasil dibuat!');
        } else {
            return redirect()->route('kampung.pengumuman.index')->with('danger', 'Pengumuman gagal dibuat!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $pengumuman)
    {
        return view('kampung.pengumuman.detail', [
            'title' => $pengumuman->title,
            'announcement' => $pengumuman
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $pengumuman)
    {
        return view('kampung.pengumuman.edit', [
            'title' => 'Edit : ' . $pengumuman->title,
            'announcement' => $pengumuman
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $pengumuman)
    {
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $update = $pengumuman->update([
            'title' => ucwords($validate['title']),
            'description' => $validate['description']
        ]);

        if($update) {
            return redirect()->route('kampung.pengumuman.show', $pengumuman->id)->with('success', 'Pengumuman berhasil diubah!');
        } else {
            return redirect()->back()->with('danger', 'Pengumuman gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $pengumuman)
    {
        $delete = $pengumuman->delete();

        if($delete) {
            return redirect()->route('kampung.pengumuman.index')->with('success', 'Pengumuman berhasil dihapus!');
        } else {
            return redirect()->back()->with('danger', 'Pengumuman gagal dihapus!');
        }
    }
}
