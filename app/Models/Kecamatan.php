<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatans';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function rumahSewa(): HasMany
    {
        return $this->hasMany(RumahSewa::class, 'id_kecamatan');
    }
}
