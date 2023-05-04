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

    public function fetchDataLengkap($id){
        return DataLengkap::selectRaw('
            data_lengkaps.id,
            data_lengkaps.uuid,
            data_lengkaps.user_id,
            users.name,
            users.telp,
            users.email,
            data_lengkaps.kecamatan_id,
            master_kecamatans.name AS kecamatan,
            data_lengkaps.kelurahan_id,
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
            master_calegs.id AS caleg_id,
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
            ->where('data_lengkaps.uuid', $id)
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
}