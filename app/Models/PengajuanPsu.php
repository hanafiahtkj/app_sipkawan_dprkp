<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanPsu extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_psu';

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
