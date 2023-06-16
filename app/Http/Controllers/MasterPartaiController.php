<?php

namespace App\Http\Controllers;

use App\Http\Requests\Master\MasterPartai\StoreMasterPartai;
use App\Http\Requests\Master\MasterPartai\UpdateMasterPartai;
use App\Models\MasterPartai;

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
    public function store(StoreMasterPartai $request)
    {

        MasterPartai::create($request->validated());

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
            'post' => $masterPartai->where('id',$id)->firstOrFail(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMasterPartai $request, MasterPartai $masterPartai, $id)
    {
        $masterPartai->where('id',$id)->update($request->validated());

        return redirect()->route('partaiIndex')->with('success', 'Your data has been updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterPartai $masterPartai, $id)
    {
        $masterPartai->where('id',$id)->delete();

        return redirect()->route('partaiIndex')->with('success', 'Your data has been deleted');
    }
}
