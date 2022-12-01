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
        Schema::create('sebaran_fasum', function (Blueprint $table) {
            $table->id();
            $table->string('penggunaan');
            $table->string('keterangan');
            $table->integer('id_kecamatan');
            $table->integer('id_kelurahan');
            $table->integer('luas');
            $table->string('nama_perumahan');
            $table->string('status_sertifikat');
            $table->string('no_sertifikat');
            $table->string('nama_pengembang');
            $table->string('koordinat');
            $table->integer('tahun_perolehan');
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
        Schema::dropIfExists('sebaran_fasum');
    }
};
