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
        Schema::create('bukan_pemukiman', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kecamatan');
            $table->integer('id_kelurahan');
            $table->string('luas');
            $table->integer('jumlah_rumah');
            $table->integer('jumlah_kk');
            $table->integer('kondisi_ekonomi');
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
        Schema::dropIfExists('bukan_pemukiman');
    }
};
