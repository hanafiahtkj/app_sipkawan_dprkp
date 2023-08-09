<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JumlahRumahImb extends Model
{
    use HasFactory;

    protected $table = 'jumlah_rumah_imb';

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
