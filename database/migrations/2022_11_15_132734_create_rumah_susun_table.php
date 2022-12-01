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
        Schema::create('rumah_susun', function (Blueprint $table) {
            $table->id();
            $table->string('nama_rumah_susun');
            $table->integer('id_kecamatan');
            $table->integer('id_kelurahan');
            $table->string('alamat');
            $table->integer('luas');
            $table->integer('jumlah');
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
        Schema::dropIfExists('rumah_susun');
    }
};
