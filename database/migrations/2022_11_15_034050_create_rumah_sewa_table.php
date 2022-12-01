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
        Schema::create('rumah_sewa', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->integer('id_kecamatan');
            $table->integer('id_kelurahan');
            $table->integer('luas_hunian');
            $table->integer('jumlah_hunian');
            $table->integer('tarif_sewa');
            $table->integer('kondisi_hunian');
            $table->string('keterangan');
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
        Schema::dropIfExists('rumah_sewa');
    }
};
