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
        Schema::create('rawan_bencana', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->integer('tingkat_kerawanan');
            $table->integer('id_kecamatan');
            $table->integer('id_kelurahan');
            $table->string('rw');
            $table->string('rt');
            $table->string('luas');
            $table->integer('jumlah_rumah');
            $table->integer('jumlah_kk');
            $table->integer('jumlah_jiwa');
            $table->integer('kondisi_fisik');
            $table->integer('status_kepemilikan');
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
        Schema::dropIfExists('rawan_bencana');
    }
};
