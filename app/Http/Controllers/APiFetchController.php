<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\MasterKecamatan;
use App\Models\MasterKelurahan;
use App\Models\MasterCaleg;
use App\Models\MasterPartai;
use Yajra\DataTables\Facades\DataTables;

class APiFetchController extends Controller
{
    public function MasterKecamatanData(){
        return DataTables::of(MasterKecamatan::query())
        ->addColumn('action', 'components.edit-icon')
        ->make(true);
    }

    public function MasterCalegData(){
        return DataTables::of(MasterCaleg::query())
        ->addColumn('action', 'components.edit-icon')
        ->make(true);
    }

    public function MasterKelurahanData(){
        return DataTables::of(MasterKelurahan::selectRaw('
                master_kelurahans.id,
                master_kelurahans.name AS kelurahan,
                master_kecamatans.name AS kecamatan,
                master_kelurahans.created_at,
                master_kelurahans.updated_at ')
        ->join('master_kecamatans', 'master_kelurahans.kecamatan_id', '=', 'master_kecamatans.id')
        ->get())
        ->addColumn('action', 'components.edit-icon')
        ->make(true);
    }
}
