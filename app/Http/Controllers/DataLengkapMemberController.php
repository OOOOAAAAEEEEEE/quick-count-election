<?php

namespace App\Http\Controllers;

use App\Models\DataLengkap;
use App\Models\MasterPartai;
use App\Models\MasterKecamatan;
use App\Models\CalegGroup;
use App\Models\SuaraGroup;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataLengkapMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('details.member.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(DataLengkap $dataLengkap)
    {
        return view('details.member.create',[
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

        return redirect()->route('dataLengkapMember')->with('success', 'Your data has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DataLengkap $dataLengkap)
    {
        return redirect()->route('dataLengkapMember');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataLengkap $dataLengkap, $id)
    {
        return view('details.member.edit', [
            'post' => $dataLengkap->fetchDataLengkapMember($id),
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

        return redirect()->route('dataLengkapMember')->with('success', 'Your data has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataLengkap $dataLengkap, $id)
    {
        $post = $dataLengkap->where('id', $id)->first();

        Storage::delete($post->image);

        DataLengkap::where('id', '=', $id)->delete();

        return redirect()->route('dataLengkapMember')->with('success', 'Your data has been deleted successfully!');
    }
}
