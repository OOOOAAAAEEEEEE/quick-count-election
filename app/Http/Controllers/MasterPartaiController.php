<?php

namespace App\Http\Controllers;

use App\Models\MasterPartai;
use Illuminate\Http\Request;

class MasterPartaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('master.partai.index', [
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.partai.create',[
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        MasterPartai::create($validatedData);

        return redirect()->route('partaiIndex')->with('success', 'Your data has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterPartai $masterPartai)
    {
        return redirect()->route('partaiIndex');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterPartai $masterPartai, $id)
    {
        return view('master.partai.edit',[
            'post' => $masterPartai->find($id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterPartai $masterPartai, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string'
        ]);

        $masterPartai->find($id)->update($validatedData);

        return redirect()->route('partaiIndex')->with('success', 'Your data has been updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterPartai $masterPartai, $id)
    {
        $masterPartai->find($id)->delete();

        return redirect()->route('partaiIndex')->with('success', 'Your data has been deleted');
    }
}
