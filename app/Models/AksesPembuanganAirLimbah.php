<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksesPembuanganAirLimbah extends Model
{
    use HasFactory;

    protected $table = 'akses_pembuangan_air_limbah';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan',);
    }

    public function kelurahan()
    {
        return $this->belongsTo(KelDesa::class, 'id_kelurahan',);
    }
}
