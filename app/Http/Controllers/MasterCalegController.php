<?php

namespace App\Http\Controllers;

use App\Models\MasterCaleg;
use App\Models\MasterPartai;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'partai_id' => 'required|numeric',
            'name' => 'required|string|max:50',
        ]);

        MasterCaleg::create($validatedData);

        return redirect()->route('calegIndex')->with('success', 'Your data has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterCaleg $masterCaleg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterCaleg $masterCaleg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterCaleg $masterCaleg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterCaleg $masterCaleg)
    {
        //
    }
}
