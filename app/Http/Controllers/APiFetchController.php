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

    public function MasterKelurahanData(){
        return DataTables::of(MasterKelurahan::query())
        ->addColumn('action', 'components.edit-icon')
        ->make(true);
    }
}
