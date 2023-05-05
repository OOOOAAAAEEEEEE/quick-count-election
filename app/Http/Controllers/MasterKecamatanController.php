<?php

namespace App\Http\Controllers;

use App\Models\MasterKecamatan;
use Illuminate\Http\Request;


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
    public function store(Request $request)
    {
        $validatedData = request()->validate([
            'name' => 'required|string|max:50'
        ]);

        MasterKecamatan::create($validatedData);

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
            'post' => $masterKecamatan->find($id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterKecamatan $masterKecamatan, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string'
        ]);

        $masterKecamatan->find($id)->update($validatedData);

        return redirect()->route('kecamatanIndex')->with('success', 'Your data has been updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterKecamatan $masterKecamatan, $id)
    {
        $masterKecamatan->find($id)->delete();

        return redirect()->route('kecamatanIndex')->with('success', 'Your data has been deleted');
    }
}