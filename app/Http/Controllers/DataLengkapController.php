<?php

namespace App\Http\Controllers;

use App\Models\DataLengkap;
use App\Models\MasterKecamatan;
use App\Models\MasterCaleg;
use Illuminate\Http\Request;
use App\Exports\DataExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class DataLengkapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('details.index', [
            'posts' => DataLengkap::selectRaw('SUM(data_lengkaps.perolehan_suara) AS perolehan_suara')->groupByRaw('caleg_id')->pluck('perolehan_suara')->toArray()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(DataLengkap  $dataLengkap){
    
        return view('details.create', [
            'kecamatans' => MasterKecamatan::all(),
            'kelurahans' => $dataLengkap->fetchKelurahan()->toJson(),
            'calegs' => MasterCaleg::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'uuid' => 'required|string',
            'kecamatan_id' => 'required|numeric',
            'kelurahan_id' => 'required|numeric',
            'rw' => 'required|numeric',
            'rt' => 'required|numeric',
            'no_tps' => 'required|numeric',
            'perolehan_suara' => 'required|numeric',
            'total_dpt' => 'required|numeric',
            'total_sss' => 'required|numeric',
            'total_ssts' => 'required|numeric',
            'total_ssr' => 'required|numeric',
            'pemilih_hadir' => 'required|numeric',
            'pemilih_tidak_hadir' => 'required|numeric',
            'caleg_id' => 'required|numeric',
            'image' => 'required|image|max:10240',
            'agree' => 'accepted',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['image'] = $request->file('image')->store('plano');
        DataLengkap::create($validatedData);

        return redirect()->route('dataLengkap')->with('success', 'Your data has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DataLengkap $dataLengkap, $id)
    {
        return redirect()->route('dataLengkap');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataLengkap $dataLengkap, $id)
    {
        return view('details.edit', [
            'post' => $dataLengkap->fetchDataLengkap($id),
            'kecamatans' => MasterKecamatan::all(),
            'kelurahans' => $dataLengkap->fetchKelurahan()->toJson(),
            'calegs' => MasterCaleg::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataLengkap $dataLengkap, $id)
    {

        $validatedData = $request->validate([
            'uuid' => 'required|string',
            'kecamatan_id' => 'required|numeric',
            'kelurahan_id' => 'required|numeric',
            'rw' => 'required|numeric',
            'rt' => 'required|numeric',
            'no_tps' => 'required|numeric',
            'perolehan_suara' => 'required|numeric',
            'total_dpt' => 'required|numeric',
            'total_sss' => 'required|numeric',
            'total_ssts' => 'required|numeric',
            'total_ssr' => 'required|numeric',
            'pemilih_hadir' => 'required|numeric',
            'pemilih_tidak_hadir' => 'required|numeric',
            'caleg_id' => 'required|numeric',
            'image' => 'image|file|max:5120',
        ]);

        if (array_key_exists('image', $validatedData)) {
            $post = $dataLengkap->where('uuid', $id)->first();

            Storage::delete($post->image);

            $validatedData['image'] = $request->file('image')->store('plano');
        }

        $validatedData['user_id'] = auth()->user()->id;

        $dataLengkap->where('uuid', $id)->update($validatedData);

        return redirect()->route('dataLengkap')->with('success', 'Your data has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataLengkap $dataLengkap, $id)
    {
        $post = $dataLengkap->where('id', $id)->first();

        Storage::delete($post->image);

        DataLengkap::where('id', '=', $id)->delete();

        return redirect()->route('dataLengkap')->with('success', 'Your data has been deleted successfully!');
    }

    public function export() 
    {
        return Excel::download(new DataExport, 'dataLengkap.xlsx');
    }
}
