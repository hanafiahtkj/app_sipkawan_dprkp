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
        Schema::create('korban_bencana', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->integer('tahun');
            $table->integer('id_kecamatan');
            $table->integer('id_kelurahan');
            $table->string('rw');
            $table->string('rt');
            $table->string('jalan');
            $table->string('nama_kk');
            $table->string('nik');
            $table->integer('jml_anggota_keluraga');
            $table->integer('kondisi_ekonomi');
            $table->integer('tingkat_kerusakan');
            $table->integer('status_kepemilikan');
            $table->integer('status');
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
        Schema::dropIfExists('korban_bencana');
    }
};
