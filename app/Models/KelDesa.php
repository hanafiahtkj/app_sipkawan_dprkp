<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelDesa extends Model
{
    use HasFactory;

    protected $table = 'kel_desas';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kec_kode', 'kode_kec');
    }
}
