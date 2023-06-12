<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahSusun extends Model
{
    use HasFactory;

    protected $table = 'rumah_susun';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function setLuasAttribute($value)
    {
        $value = str_replace(',', '.', $value);
        $this->attributes['luas'] = floatval($value);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan',);
    }

    public function kelurahan()
    {
        return $this->belongsTo(KelDesa::class, 'id_kelurahan',);
    }
}
