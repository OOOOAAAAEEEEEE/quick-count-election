<?php

namespace App\Http\Controllers;

use App\Models\MasterKelurahan;
use Illuminate\Http\Request;

class MasterKelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('master.kelurahan.index',[
            'posts' => MasterKelurahan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
