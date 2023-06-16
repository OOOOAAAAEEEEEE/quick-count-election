<?php

namespace App\Http\Controllers;

use App\Http\Requests\Master\MasterCaleg\StoreMasterCaleg;
use App\Http\Requests\Master\MasterCaleg\UpdateMasterCaleg;
use App\Models\MasterCaleg;
use App\Models\MasterPartai;

class MasterCalegController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('master.caleg.index',[

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.caleg.create', [
            'posts' => MasterPartai::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMasterCaleg $request)
    {
        MasterCaleg::create($request->validated());

        return redirect()->route('calegIndex')->with('success', 'Your data has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterCaleg $masterCaleg)
    {
        return redirect()->route('calegIndex');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterCaleg $masterCaleg, $id)
    {
        return view('master.caleg.edit',[
            'post' => $masterCaleg->where('id', $id)->firstOrFail(),
            'datas' => MasterPartai::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMasterCaleg $request, MasterCaleg $masterCaleg, $id)
    {
        $masterCaleg->where('id', $id)->update($request->validated());

        return redirect()->route('calegIndex')->with('success', 'Your data has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterCaleg $masterCaleg, $id)
    {
        $masterCaleg->where('id', $id)->delete();

        return redirect()->route('calegIndex')->with('success', 'Your data has been deleted successfully!');
    }
}
