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
        Schema::create('sebaran_komplek', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perumahan');
            $table->string('nama_pengembang');
            $table->integer('id_kecamatan');
            $table->integer('id_kelurahan');
            $table->integer('luas');
            $table->integer('jenis');
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
        Schema::dropIfExists('sebaran_komplek');
    }
};
