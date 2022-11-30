<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ComplaintCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category', [
            'title' => 'Kategori Pengaduan',
            'categories' => ComplaintCategory::orderBy('id', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'category' => 'required'
        ]);

        // Check validation
        if($validate->fails()) {
            return response()->json([
                'icon' => 'error',
                'message' => $validate->errors()
            ], 422);
        }

        // Create category
        $category = ComplaintCategory::create([
            'category' => ucfirst($request->category)
        ]);

        if ($category) {
            return response()->json([
                'icon' => 'success',
                'message' => 'Kategori Pengaduan berhasil ditambah!'
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ComplaintCategory $category)
    {
        return response()->json([
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ComplaintCategory $category)
    {
        $validate = Validator::make($request->all(), [
            'category' => 'required'
        ]);

        if($validate->fails()) {
            return response()->json([
                'icon' => 'error',
                'message' => $validate->errors()
            ], 422);
        }

        $update = $category->update([
            'category' => ucfirst($request->category)
        ]);

        if($update) {
            return response()->json([
                'icon' => 'success',
                'message' => 'Data berhasil diupdate!'
            ]);
        } else {
            return response()->json([
                'icon' => 'error',
                'message' => 'Data gagal diupdate!'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComplaintCategory $category)
    {
        $delete = $category->delete();

        if($delete) {
            return response()->json([
                'icon' => 'success',
                'message' => 'Data berhasil dihapus!'
            ]);
        } else {
            return response()->json([
                'icon' => 'error',
                'message' => 'Data gagal dihapus!'
            ]);
        }
    }
}
