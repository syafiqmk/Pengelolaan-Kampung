<?php

namespace App\Http\Controllers\kampung;

use App\Models\Village;
use App\Models\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $village = Village::where('admin_id', '=', auth()->user()->id)->firstOrFail();
        return view('kampung.information.index', [
            'title' => 'Informasi',
            'informations' => Information::where('village_id', '=', $village->id)->orderBy('id', 'DESC')->paginate(10),
            'count' => Information::where('village_id', '=', $village->id)->count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kampung.information.create', [
            'title' => 'Tambah Informasi',
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
            'description' => 'required',
        ]);

        $create = Information::create([
            'title' => ucwords($validate['title']),
            'description' => $validate['description'],
            'village_id' => Village::where('admin_id', '=', auth()->user()->id)->firstOrFail()->id
        ]);

        if($create) {
            return redirect()->route('kampung.information.index')->with('success', 'Informasi berhasil ditambah!');
        } else {
            return redirect()->route('kampung.information.index')->with('danger', 'Informasi gagal ditambah!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        return view('kampung.information.detail', [
            'title' => $information->title,
            'information' => $information
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information)
    {
        return view('kampung.information.edit', [
            'title' => 'Edit ' . $information->title,
            'information' => $information
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $information)
    {
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $update = $information->update([
            'title' => ucwords($validate['title']),
            'description' => $validate['description']
        ]);

        if($update) {
            return redirect()->route('kampung.information.show', $information->id)->with('success', 'Informasi berhasil diubah!');
        } else {
            return redirect()->back()->with('danger', 'Informasi gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        $delete = $information->delete();

        if($delete) {
            return redirect()->route('kampung.information.index')->with('success', 'Informasi berhasil dihapus!');
        } else {
            return redirect()->back()->with('danger', 'Informasi gagal dihapus!');
        }
    }
}
