<?php

namespace App\Http\Controllers;

use App\Http\Requests\Master\MasterKelurahan\StoreMasterKelurahan;
use App\Http\Requests\Master\MasterKelurahan\UpdateMasterKelurahan;
use App\Models\MasterKecamatan;
use App\Models\MasterKelurahan;

class MasterKelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MasterKelurahan $masterKelurahan)
    {
        return view('master.kelurahan.index',[
            'posts' => $masterKelurahan->fetchData(),
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
    public function store(StoreMasterKelurahan $request)
    {
        MasterKelurahan::create($request->validated());

        return redirect()->route('kelurahanIndex')->with('success', 'Your data has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterKelurahan $masterKelurahan)
    {
        return redirect()->route('kelurahanIndex');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterKelurahan $masterKelurahan, $id)
    {
        return view('master.kelurahan.edit',[
            'post' => $masterKelurahan->where('id', $id)->firstOrFail(),
            'datas' => MasterKecamatan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMasterKelurahan $request, MasterKelurahan $masterKelurahan, $id)
    {
        $masterKelurahan->where('id', $id)->update($request->validated());

        return redirect()->route('kelurahanIndex')->with('success', 'Your data has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterKelurahan $masterKelurahan, $id)
    {
        $masterKelurahan->where('id', $id)->delete();

        return redirect()->route('kelurahanIndex')->with('success', 'Your data has been deleted successfully!');
    }
}
