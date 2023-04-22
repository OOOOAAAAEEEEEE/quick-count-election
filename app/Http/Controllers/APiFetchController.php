<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\MasterKecamatan;
use App\Models\MasterKelurahan;
use App\Models\MasterCaleg;
use App\Models\MasterPartai;


class APiFetchController extends Controller
{
    public function MasterKecamatanData(){
        $query = MasterKecamatan::all();
        return datatables($query)->make(true);
    }
}
