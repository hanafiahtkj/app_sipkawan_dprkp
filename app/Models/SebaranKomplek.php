<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SebaranKomplek extends Model
{
    use HasFactory;

    protected $table = 'sebaran_komplek';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan',);
    }

    public function kelurahan()
    {
        return $this->belongsTo(KelDesa::class, 'id_kelurahan',);
    }

    public static function jenis($key = '')
    {
        $db = [
            1 => 'Umum',
            2 => 'Komersil',
            3 => 'Berimbang',
            4 => 'Khusus',
            5 => 'Umum dan Komersil',
        ];
        return ($key != '') ? $db[$key] : $db;
    }
}
