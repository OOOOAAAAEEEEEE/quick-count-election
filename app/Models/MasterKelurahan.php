<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKelurahan extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function fetchCreate(){
        MasterKelurahan::selectRaw("
        master_kelurahans.id,
        master_kelurahans.name AS kelurahan,
        master_kecamatans.name AS kecamatan,
        master_kelurahans.created_at,
        master_kelurahans.updated_at
    ")
    ->join('master_kecamatans', 'master_kelurahans.kecamatan_id', '=', 'master_kecamatans.id')
    ->get();
    }
}
