<?php

namespace App\Http\Controllers;

use App\Models\DataLengkap;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.index', [
            'posts' => DataLengkap::selectRaw('
                master_calegs.name AS caleg,
                sum(perolehan_suara) AS total
                ')
            ->join('master_calegs', 'data_lengkaps.caleg_id', 'master_calegs.id')
            ->groupBy('master_calegs.name')
            ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create', [
            
        ]);
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
    public function show(DataLengkap $dataLengkap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataLengkap $dataLengkap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataLengkap $dataLengkap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataLengkap $dataLengkap)
    {
        //
    }
}
