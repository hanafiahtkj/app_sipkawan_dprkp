<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BantuanPsu extends Model
{
    use HasFactory;

    protected $table = 'bantuan_psu';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static function status_aset($key = '')
    {
        $db = [
            1 => 'Sudah Diserahkan',
            2 => 'Belum Diserahkan',
        ];
        return ($key != '') ? $db[$key] : $db;
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan',);
    }

    public function kelurahan()
    {
        return $this->belongsTo(KelDesa::class, 'id_kelurahan',);
    }

    public static function jenis_psu($key = '')
    {
        $db = [
            1 => 'Jalan Aspal',
            2 => 'Jalan Beton',
            3 => 'Fasum',
        ];
        return ($key != '') ? $db[$key] : $db;
    }

    public static function jenis_sarana($key = '')
    {
        $db = [
            1 => 'Jalan Aspal',
            2 => 'Jalan Beton',
            3 => 'Fasum',
        ];
        return ($key != '') ? $db[$key] : $db;
    }
}
