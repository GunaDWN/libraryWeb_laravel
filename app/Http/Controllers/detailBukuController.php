<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;

class detailBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view ('details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->files('image')){
            $image_name = $request->files('image')->store('images','public');
        }

        Detail::create([
            'tittle' => $request->title,
            'content' => $request->content,
            'featured_image' => $image_name,
        ]);
        return 'Artikel berhasil disimpan';
    }

    /**
     * Display the specified resource.
     */
    public function show(Detail $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Detail $detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Detail $detail)
    {
        //
    }
}
