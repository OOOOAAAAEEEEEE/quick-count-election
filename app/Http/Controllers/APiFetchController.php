<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\DataLengkap;
use App\Models\MasterKecamatan;
use App\Models\MasterKelurahan;
use App\Models\MasterCaleg;
use App\Models\MasterPartai;
use Yajra\DataTables\Facades\DataTables;

class APiFetchController extends Controller
{
    public function MasterKecamatanData(){
        return DataTables::of(MasterKecamatan::query())
        ->addColumn('action', 'components.action-icon')
        ->make(true);
    }

    public function MasterPartaiData(){
        return DataTables::of(MasterPartai::query())
        ->addColumn('action', 'components.action-icon')
        ->make(true);
    }

    public function MasterUserData(){
        return DataTables::of(User::query())
        ->addColumn('action', 'components.action-icon')
        ->make(true);
    }

    public function DataLengkap(){
        return DataTables::of(DataLengkap::selectRaw('
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
        ->limit(100))
        ->addColumn('action', 'components.action-icon')
        ->make(true);
    }

    public function DataLengkapMember($user_id){

        return DataTables::of(DataLengkap::selectRaw('
            data_lengkaps.id,
            data_lengkaps.uuid,
            data_lengkaps.user_id,
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
        ->where('user_id', $user_id)
        ->join('users', 'data_lengkaps.user_id', 'users.id')
        ->join('master_kecamatans', 'data_lengkaps.kecamatan_id', 'master_kecamatans.id')
        ->join('master_kelurahans', 'data_lengkaps.kelurahan_id', 'master_kelurahans.id')
        ->join('master_calegs', 'data_lengkaps.caleg_id', 'master_calegs.id')
        ->limit(100))
        ->addColumn('action', 'components.action-icon')
        ->make(true);
    }

    public function MasterCalegData(){
        return DataTables::of(MasterCaleg::selectRaw('
            master_calegs.id,
            master_calegs.name AS caleg,
            master_partais.name AS partai,
            master_calegs.gender,
            master_calegs.created_at,
            master_calegs.updated_at
        ')
        ->join('master_partais', 'master_calegs.partai_id', '=', 'master_partais.id')
        ->get())
        ->addColumn('action', 'components.action-icon')
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
        ->addColumn('action', 'components.action-icon')
        ->make(true);
    }
}
