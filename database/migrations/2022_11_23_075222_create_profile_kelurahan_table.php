<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_kelurahan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kecamatan');
            $table->integer('id_kelurahan');
            $table->integer('luas_wilayah');
            $table->integer('jumlah_rumah');
            $table->integer('jumlah_rt');
            $table->integer('jumlah_kk');
            $table->integer('jumlah_penduduk');
            $table->integer('jumlah_rtlh');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_kelurahan');
    }
};
