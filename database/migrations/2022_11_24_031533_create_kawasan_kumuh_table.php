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
        Schema::create('kawasan_kumuh', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kecamatan');
            $table->integer('id_kelurahan');
            $table->integer('jumlah_rumah');
            $table->integer('jumlah_kk');
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
        Schema::dropIfExists('kawasan_kumuh');
    }
};
