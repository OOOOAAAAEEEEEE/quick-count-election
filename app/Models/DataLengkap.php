<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLengkap extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'id', 'user_id', 'kecamatan_id', 'kelurahan_id', 'rt', 'rw', 'no_tps', 'total_dpt', 'total_sss',
    //     'total_ssts', 'total_ssr','pemilih_hadir','pemilih_tidak_hadir','caleg_id',
    //     'perolehan_suara','image', 'created_at','updated_at',
    // ];

    protected $guarded = [
        'id'
    ];

    public function fetchDataLengkap($id)
    {
        return DataLengkap::selectRaw('
        data_lengkaps.id,
        data_lengkaps.uuid,
        users.name AS pengirim,
        master_kecamatans.name AS kecamatan,
        data_lengkaps.kecamatan_id,
        master_kelurahans.name AS kelurahan,
        data_lengkaps.kelurahan_id,
        data_lengkaps.rt,
        data_lengkaps.rw,
        data_lengkaps.no_tps,
        data_lengkaps.total_dpt,
        data_lengkaps.total_sss,
        data_lengkaps.total_ssts,
        data_lengkaps.total_ssr,
        data_lengkaps.pemilih_hadir,
        data_lengkaps.pemilih_tidak_hadir,
        master_partais.id AS partai_id,
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
            ->where('data_lengkaps.uuid', $id)
            ->firstOrFail();
    }

    public function fetchDataLengkapMember($id)
    {
        return DataLengkap::selectRaw('
        data_lengkaps.id,
        data_lengkaps.uuid,
        users.name AS pengirim,
        master_kecamatans.name AS kecamatan,
        data_lengkaps.kecamatan_id,
        master_kelurahans.name AS kelurahan,
        data_lengkaps.kelurahan_id,
        data_lengkaps.rt,
        data_lengkaps.rw,
        data_lengkaps.no_tps,
        data_lengkaps.total_dpt,
        data_lengkaps.total_sss,
        data_lengkaps.total_ssts,
        data_lengkaps.total_ssr,
        data_lengkaps.pemilih_hadir,
        data_lengkaps.pemilih_tidak_hadir,
        master_partais.id AS partai_id,
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
            ->where('data_lengkaps.uuid', $id)
            ->where('user_id', auth()->user()->id)
            ->firstOrFail();
    }


    public function fetchKelurahan()
    {
        return MasterKelurahan::selectRaw('
            master_kelurahans.id AS kelurahanID,
            master_kelurahans.kecamatan_id AS kecamatanID,
            master_kecamatans.name AS kecamatan,
            master_kelurahans.name AS kelurahan
        ')
            ->join('master_kecamatans', 'master_kelurahans.kecamatan_id', 'master_kecamatans.id')
            ->get();
    }

    public function fetchCaleg()
    {
        return MasterCaleg::selectRaw('
            master_calegs.id AS calegID,
            master_calegs.partai_id AS partaiID,
            master_calegs.name AS caleg,
            master_partais.name AS partai
        ')
        ->join('master_partais', 'master_calegs.partai_id', 'master_partais.id')
        ->get();
    }
}