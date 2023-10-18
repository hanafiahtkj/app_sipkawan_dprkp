<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawanBencana extends Model
{
    use HasFactory;

    protected $table = 'rawan_bencana';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan',);
    }

    public function kelurahan()
    {
        return $this->belongsTo(KelDesa::class, 'id_kelurahan',);
    }

    public static function tingkat_kerawanan($key = '')
    {
        $db = [
            1 => 'Rendah',
            2 => 'Sedang',
            3 => 'Tinggi',
        ];
        return ($key != '') ? $db[$key] : $db;
    }
}
