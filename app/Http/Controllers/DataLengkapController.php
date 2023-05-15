<?php

namespace App\Http\Controllers;

use App\Models\DataLengkap;
use App\Models\MasterKecamatan;
use App\Models\MasterCaleg;
use Illuminate\Http\Request;
use App\Exports\DataExport;
use App\Models\MasterPartai;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Illuminate\Support\Facades\Storage;

class DataLengkapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('details.index', [
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(DataLengkap  $dataLengkap){
    
        return view('details.create', [
            'kecamatans' => MasterKecamatan::all(),
            'kelurahans' => $dataLengkap->fetchKelurahan()->toJson(),
            'calegs' => MasterCaleg::all(),
            'partais' => MasterPartai::all()
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

    public function export(Request $request) 
    {
        (new DataExport)->queue('dataLengkap.xlsx');

        return back()->withSuccess('Data Export in progress, please wait');
    }

    public function spatie()
    {
        $rows = [];

        DataLengkap::query()->selectRaw('
            users.name AS pengirim,
            master_kecamatans.name AS kecamatan,
            master_kelurahans.name AS kelurahan,
            data_lengkaps.rt,
            data_lengkaps.rw,
            data_lengkaps.no_tps,
            data_lengkaps.total_dpt,
            data_lengkaps.total_sss,
            data_lengkaps.total_ssts,
            data_lengkaps.total_ssr,
            data_lengkaps.pemilih_hadir,
            data_lengkaps.pemilih_tidak_hadir,
            master_calegs.name AS caleg,
            data_lengkaps.perolehan_suara,
            data_lengkaps.image,
            data_lengkaps.created_at,
            data_lengkaps.updated_at
        ')
        ->join('users', 'data_lengkaps.user_id', 'users.id')
        ->join('master_kecamatans', 'data_lengkaps.kecamatan_id', 'master_kecamatans.id')
        ->join('master_kelurahans', 'data_lengkaps.kelurahan_id', 'master_kelurahans.id')
        ->join('master_calegs', 'data_lengkaps.caleg_id', 'master_calegs.id')
        ->chunk(2000, function($dataLengkaps) use (&$rows){
            foreach ($dataLengkaps->toArray() as $dataLengkap) {
                $rows[] = $dataLengkap;
            }
        });

        SimpleExcelWriter::streamDownload('dataLengkap.csv')
            ->noHeaderRow()
            ->addRows($rows);
    }
}
