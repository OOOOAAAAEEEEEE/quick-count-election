<?php

namespace App\Http\Controllers;

use App\Models\MasterKecamatan;
use App\Models\MasterKelurahan;
use Illuminate\Http\Request;

class MasterKelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MasterKelurahan $masterKelurahan)
    {
        return view('master.kelurahan.index',[
            'posts' => $masterKelurahan->fetchCreate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.kelurahan.create', [
            'posts' => MasterKecamatan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kecamatan_id' => 'required|numeric',
            'name' => 'required|string|max:50'
        ]);

        MasterKelurahan::create($validatedData);

        return redirect()->route('kelurahanIndex')->with('success', 'Your data has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterKelurahan $masterKelurahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterKelurahan $masterKelurahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterKelurahan $masterKelurahan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterKelurahan $masterKelurahan)
    {
        return redirect()->route('kelurahanIndex');
    }
}
