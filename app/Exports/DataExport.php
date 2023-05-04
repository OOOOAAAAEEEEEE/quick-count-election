<?php

namespace App\Exports;

use App\Models\DataLengkap;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class DataExport implements FromQuery
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return DataLengkap::query()->selectRaw('
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
        ->join('master_calegs', 'data_lengkaps.caleg_id', 'master_calegs.id');
    }
}
