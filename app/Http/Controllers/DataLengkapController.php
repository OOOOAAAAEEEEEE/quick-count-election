<?php

namespace App\Http\Controllers;

use App\Models\DataLengkap;
use App\Models\CalegGroup;
use App\Models\SuaraGroup;
use App\Models\MasterKecamatan;
use App\Models\MasterPartai;
use App\Exports\DataExport;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
            'calegs' => $dataLengkap->fetchCaleg()->toJson(),
            'partais' => MasterPartai::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedCaleg = $request->validate([
            'no_tps' => 'required|numeric',
            'kelurahan_id' => 'required|numeric',
            'partai_id' => 'required|numeric',
            'caleg1' => 'string',
            'caleg2' => 'string',
            'caleg3' => 'string',
            'caleg4' => 'string',
            'caleg5' => 'string',
            'caleg6' => 'string',
            'caleg7' => 'string',
            'caleg8' => 'string',
            'caleg9' => 'string',
            'caleg10' => 'string'
        ]);

        CalegGroup::create($validatedCaleg);

        $validatedSuara = $request->validate([
            'no_tps' => 'numeric|required',
            'kelurahan_id' => 'numeric|required',
            'partai_id' => 'numeric|required',
            'suara1' => 'numeric',
            'suara2' => 'numeric',
            'suara3' => 'numeric',
            'suara4' => 'numeric',
            'suara5' => 'numeric',
            'suara6' => 'numeric',
            'suara7' => 'numeric',
            'suara8' => 'numeric',
            'suara9' => 'numeric',
            'suara10' => 'numeric'
        ]);

        SuaraGroup::create($validatedSuara);

        $validatedData = Validator::make($request->all(), [
            'uuid' => 'required|string',
            'user_id' => 'required|numeric',
            'kecamatan_id' => 'required|numeric',
            'kelurahan_id' => 'required|numeric',
            'partai_id' => 'required|numeric',
            'rw' => 'required|numeric',
            'rt' => 'required|numeric',
            'no_tps' => 'required|numeric',
            'total_dpt' => 'required|numeric',
            'total_sss' => 'required|numeric',
            'total_ssts' => 'required|numeric',
            'total_ssr' => 'required|numeric',
            'pemilih_hadir' => 'required|numeric',
            'pemilih_tidak_hadir' => 'required|numeric',
            'image' => 'required|image|max:10240',
            'agree' => 'accepted'
        ]);

        if($validatedData->fails()){

            CalegGroup::where('no_tps', $request->no_tps)
            ->where('kelurahan_id', $request->kelurahan_id)
            ->where('partai_id', $request->partai_id)
            ->delete();

            SuaraGroup::where('no_tps', $request->no_tps)
            ->where('kelurahan_id', $request->kelurahan_id)
            ->where('partai_id', $request->partai_id)
            ->delete();

            redirect()->route('dataLengkapCreate')
            ->withErrors($validatedData)
            ->withInput();
        }

        $validatedData = $validatedData->validate();

        $validatedData['caleg_group_id'] = CalegGroup::select('id')
        ->where('no_tps', $validatedData['no_tps'])
        ->where('kelurahan_id', $validatedData['kelurahan_id'])
        ->where('partai_id', $validatedData['partai_id'])
        ->value('id');

        $validatedData['suara_group_id'] = SuaraGroup::select('id')
        ->where('no_tps', $validatedData['no_tps'])
        ->where('kelurahan_id', $validatedData['kelurahan_id'])
        ->where('partai_id', $validatedData['partai_id'])
        ->value('id');

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
            'calegs' => $dataLengkap->fetchCaleg()->toJson(),
            'partais' => MasterPartai::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataLengkap $dataLengkap, $id)
    {

        $validatedCaleg = $request->validate([
            'no_tps' => 'required|numeric',
            'kelurahan_id' => 'required|numeric',
            'partai_id' => 'required|numeric',
            'caleg1' => 'string',
            'caleg2' => 'string',
            'caleg3' => 'string',
            'caleg4' => 'string',
            'caleg5' => 'string',
            'caleg6' => 'string',
            'caleg7' => 'string',
            'caleg8' => 'string',
            'caleg9' => 'string',
            'caleg10' => 'string'
        ]);

        CalegGroup::where('no_tps', $validatedCaleg['no_tps'])
                    ->where('kelurahan_id', $validatedCaleg['kelurahan_id'])
                    ->where('partai_id', $validatedCaleg['partai_id'])
                    ->update($validatedCaleg);

        $validatedSuara = $request->validate([
            'no_tps' => 'numeric|required',
            'kelurahan_id' => 'numeric|required',
            'partai_id' => 'numeric|required',
            'suara1' => 'numeric',
            'suara2' => 'numeric',
            'suara3' => 'numeric',
            'suara4' => 'numeric',
            'suara5' => 'numeric',
            'suara6' => 'numeric',
            'suara7' => 'numeric',
            'suara8' => 'numeric',
            'suara9' => 'numeric',
            'suara10' => 'numeric'
        ]);

        SuaraGroup::where('no_tps', $validatedSuara['no_tps'])
                    ->where('kelurahan_id', $validatedSuara['kelurahan_id'])
                    ->where('partai_id', $validatedSuara['partai_id'])
                    ->update($validatedSuara);

        $validatedData = $request->validate([
            'uuid' => 'required|string',
            'kecamatan_id' => 'required|numeric',
            'kelurahan_id' => 'required|numeric',
            'partai_id' => 'required|numeric',
            'rw' => 'required|numeric',
            'rt' => 'required|numeric',
            'no_tps' => 'required|numeric',
            'total_dpt' => 'required|numeric',
            'total_sss' => 'required|numeric',
            'total_ssts' => 'required|numeric',
            'total_ssr' => 'required|numeric',
            'pemilih_hadir' => 'required|numeric',
            'pemilih_tidak_hadir' => 'required|numeric',
            'image' => '|file|image|max:10240'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        $validatedData['caleg_group_id'] = CalegGroup::select('id')
        ->where('no_tps', $validatedData['no_tps'])
        ->where('kelurahan_id', $validatedData['kelurahan_id'])
        ->where('partai_id', $validatedData['partai_id'])
        ->value('id');

        $validatedData['suara_group_id'] = SuaraGroup::select('id')
        ->where('no_tps', $validatedData['no_tps'])
        ->where('kelurahan_id', $validatedData['kelurahan_id'])
        ->where('partai_id', $validatedData['partai_id'])
        ->value('id');

        if (array_key_exists('image', $validatedData)) {
            $post = $dataLengkap->where('uuid', $id)->first();

            Storage::delete($post->image);

            $validatedData['image'] = $request->file('image')->store('plano');
        }

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
        data_lengkaps.id,
        data_lengkaps.uuid,
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
        master_partais.name AS partai,
        data_lengkaps.image,
        data_lengkaps.created_at,
        data_lengkaps.updated_at,
        caleg_groups.caleg1,
        suara_groups.suara1,
        caleg_groups.caleg2,
        suara_groups.suara2,
        caleg_groups.caleg3,
        suara_groups.suara3,
        caleg_groups.caleg4,
        suara_groups.suara4,
        caleg_groups.caleg5,
        suara_groups.suara5,
        caleg_groups.caleg6,
        suara_groups.suara6,
        caleg_groups.caleg7,
        suara_groups.suara7,
        caleg_groups.caleg8,
        suara_groups.suara8,
        caleg_groups.caleg9,
        suara_groups.suara9,
        caleg_groups.caleg10,
        suara_groups.suara10
        ')
        ->join('users', 'data_lengkaps.user_id', 'users.id')
        ->join('master_kecamatans', 'data_lengkaps.kecamatan_id', 'master_kecamatans.id')
        ->join('master_kelurahans', 'data_lengkaps.kelurahan_id', 'master_kelurahans.id')
        ->join('caleg_groups', 'data_lengkaps.caleg_group_id', 'caleg_groups.id')
        ->join('suara_groups', 'data_lengkaps.suara_group_id', 'suara_groups.id')
        ->join('master_partais', 'data_lengkaps.partai_id', 'master_partais.id')
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
