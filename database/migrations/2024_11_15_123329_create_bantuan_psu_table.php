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
        Schema::create('bantuan_psu', function (Blueprint $table) {
            $table->id();
            $table->integer('status_aset');
            $table->string('nama_perumahan');
            $table->integer('id_kecamatan');
            $table->integer('id_kelurahan');
            $table->integer('jumlah_sertifikat');
            $table->integer('panjang');
            $table->integer('lebar');
            $table->integer('jenis_psu');
            $table->integer('jenis_sarana');
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
        Schema::dropIfExists('bantuan_psu');
    }
};
