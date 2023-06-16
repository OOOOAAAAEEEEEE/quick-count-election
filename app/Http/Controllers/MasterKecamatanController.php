<?php

namespace App\Http\Controllers;

use App\Models\MasterKecamatan;
use App\Http\Requests\Master\MasterKecamatan\UpdateMasterKecamatan;
use App\Http\Requests\Master\MasterKecamatan\StoreMasterKecamatan;


class MasterKecamatanController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('master.kecamatan.index', [
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.kecamatan.create',[

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMasterKecamatan $request)
    {
        MasterKecamatan::create($request->validated());

        return redirect()->route('kecamatanIndex')->with('success', 'Your data has been add successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterKecamatan $masterKecamatan)
    {
        return redirect()->route('kecamatanIndex');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterKecamatan $masterKecamatan, $id)
    {
        return view('master.kecamatan.edit',[
            'post' => $masterKecamatan->where('id', $id)->firstOrFail(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMasterKecamatan $request, MasterKecamatan $masterKecamatan, $id)
    {
        $masterKecamatan->where('id', $id)->update($request->validated());

        return redirect()->route('kecamatanIndex')->with('success', 'Your data has been updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterKecamatan $masterKecamatan, $id)
    {
        $masterKecamatan->where('id', $id)->delete();

        return redirect()->route('kecamatanIndex')->with('success', 'Your data has been deleted');
    }
}