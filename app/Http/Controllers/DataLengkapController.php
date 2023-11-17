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
use Illuminate\Support\Str;
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

        $request->validate([
            'kecamatan_id' => 'required|numeric',
            'kelurahan_id' => 'required|numeric',
            'rw' => 'required|numeric',
            'rt' => 'required|numeric',
            'no_tps' => 'required|numeric',
            'total_dpt' => 'required|numeric',
            'total_sss' => 'required|numeric',
            'total_ssts' => 'required|numeric',
            'total_ssr' => 'required|numeric',
            'pemilih_hadir' => 'required|numeric',
            'pemilih_tidak_hadir' => 'required|numeric',
            'partai_id' => 'required|numeric',
            'caleg1' => 'string|required',
            'suara1' => 'numeric|required',
            'caleg2' => 'string|required',
            'suara2' => 'numeric|required',
            'caleg3' => 'string|required',
            'suara3' => 'numeric|required',
            'caleg4' => 'string|required',
            'suara4' => 'numeric|required',
            'caleg5' => 'string|required',
            'suara5' => 'numeric|required',
            'caleg6' => 'string|required',
            'suara6' => 'numeric|required',
            'caleg7' => 'string|required',
            'suara7' => 'numeric|required',
            'caleg8' => 'string|required',
            'suara8' => 'numeric|required',
            'caleg9' => 'string|required',
            'suara9' => 'numeric|required',
            'caleg10' => 'string|required',
            'suara10' => 'numeric|required',
            'image' => 'required|image|max:10240'
        ]);

        $validatedCaleg = $request->validate([
            'no_tps' => 'required|numeric',
            'kelurahan_id' => 'required|numeric',
            'partai_id' => 'required|numeric',
            'caleg1' => 'string|required',
            'caleg2' => 'string|required',
            'caleg3' => 'string|required',
            'caleg4' => 'string|required',
            'caleg5' => 'string|required',
            'caleg6' => 'string|required',
            'caleg7' => 'string|required',
            'caleg8' => 'string|required',
            'caleg9' => 'string|required',
            'caleg10' => 'string|required'
        ]);

        CalegGroup::create($validatedCaleg);

        $validatedSuara = $request->validate([
            'no_tps' => 'numeric|required',
            'kelurahan_id' => 'numeric|required',
            'partai_id' => 'numeric|required',
            'suara1' => 'numeric|required',
            'suara2' => 'numeric|required',
            'suara3' => 'numeric|required',
            'suara4' => 'numeric|required',
            'suara5' => 'numeric|required',
            'suara6' => 'numeric|required',
            'suara7' => 'numeric|required',
            'suara8' => 'numeric|required',
            'suara9' => 'numeric|required',
            'suara10' => 'numeric|required'
        ]);

        SuaraGroup::create($validatedSuara);

        $validatedData = Validator::make($request->all(), [
            'kecamatan_id' => 'required|numeric',
            'kelurahan_id' => 'required|numeric',
            'rw' => 'required|numeric',
            'rt' => 'required|numeric',
            'no_tps' => 'required|numeric',
            'total_dpt' => 'required|numeric',
            'total_sss' => 'required|numeric',
            'total_ssts' => 'required|numeric',
            'total_ssr' => 'required|numeric',
            'pemilih_hadir' => 'required|numeric',
            'pemilih_tidak_hadir' => 'required|numeric',
            'partai_id' => 'required|numeric',
            'image' => 'required|image|max:10240'
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

            return redirect()->route('dataLengkapCreate')
            ->withErrors($validatedData)
            ->withInput();
        }else{
            $validatedData = $validatedData->validate();
            
            $validatedData['uuid'] = Str::uuid();
            
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
            
            $validatedData['image'] = $request->file('image')->store('plano');
            DataLengkap::create($validatedData);

            return redirect()->route('dataLengkap')->with('success', 'Your data has been added successfully!');
            
        }
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

        $oldData = $dataLengkap->where('uuid', $id)->first();

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

        if(array_key_exists('caleg1', $validatedCaleg)){
            CalegGroup::where('no_tps', $oldData->no_tps)
            ->where('kelurahan_id', $oldData->kelurahan_id)
            ->where('partai_id', $oldData->partai_id)
            ->delete();

            CalegGroup::create($validatedCaleg);
        }else{
            CalegGroup::where('no_tps', $oldData->no_tps)
            ->where('kelurahan_id', $oldData->kelurahan_id)
            ->where('partai_id', $oldData->partai_id)
            ->update($validatedCaleg);
        }


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

        if(array_key_exists('suara1', $validatedSuara)){
            SuaraGroup::where('no_tps', $oldData->no_tps)
            ->where('kelurahan_id', $oldData->kelurahan_id)
            ->where('partai_id', $oldData->partai_id)
            ->delete();

            SuaraGroup::create($validatedSuara);
        }else{
            SuaraGroup::where('no_tps', $oldData->no_tps)
            ->where('kelurahan_id', $oldData->kelurahan_id)
            ->where('partai_id', $oldData->partai_id)
            ->update($validatedSuara);
        }

        

        $validatedData = $request->validate([
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

        $validatedData['caleg_group_id'] = CalegGroup::select('id')
        ->where('no_tps', $request->no_tps)
        ->where('kelurahan_id', $request->kelurahan_id)
        ->where('partai_id', $request->partai_id)
        ->value('id');

        $validatedData['suara_group_id'] = SuaraGroup::select('id')
        ->where('no_tps', $request->no_tps)
        ->where('kelurahan_id', $request->kelurahan_id)
        ->where('partai_id', $request->partai_id)
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
