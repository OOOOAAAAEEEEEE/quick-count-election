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
        ->toJson();
    }

    public function MasterPartaiData(){
        return DataTables::of(MasterPartai::query())
        ->addColumn('action', 'components.action-icon')
        ->toJson();
    }

    public function MasterUserData(){
        return DataTables::of(User::query())
        ->addColumn('action', 'components.action-icon')
        ->toJson();
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
        ->join('master_partais', 'data_lengkaps.partai_id', 'master_partais.id'))
        ->addColumn('action', 'components.action-icon')
        ->toJson();
    }

    public function DataLengkapMember($user_id){

        return DataTables::of(DataLengkap::selectRaw('
        data_lengkaps.id,
        data_lengkaps.user_id,
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
        ->where('user_id', $user_id)
        ->join('users', 'data_lengkaps.user_id', 'users.id')
        ->join('master_kecamatans', 'data_lengkaps.kecamatan_id', 'master_kecamatans.id')
        ->join('master_kelurahans', 'data_lengkaps.kelurahan_id', 'master_kelurahans.id')
        ->join('caleg_groups', 'data_lengkaps.caleg_group_id', 'caleg_groups.id')
        ->join('suara_groups', 'data_lengkaps.suara_group_id', 'suara_groups.id')
        ->join('master_partais', 'data_lengkaps.partai_id', 'master_partais.id'))
        ->addColumn('action', 'components.action-icon')
        ->toJson();
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
        ->join('master_partais', 'master_calegs.partai_id', '=', 'master_partais.id'))
        ->addColumn('action', 'components.action-icon')
        ->toJson();
    }

    public function MasterKelurahanData(){
        return DataTables::of(MasterKelurahan::selectRaw('
                master_kelurahans.id,
                master_kelurahans.name AS kelurahan,
                master_kecamatans.name AS kecamatan,
                master_kelurahans.created_at,
                master_kelurahans.updated_at ')
        ->join('master_kecamatans', 'master_kelurahans.kecamatan_id', '=', 'master_kecamatans.id'))
        ->addColumn('action', 'components.action-icon')
        ->toJson();
    }
}
