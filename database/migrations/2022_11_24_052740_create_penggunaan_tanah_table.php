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
        Schema::create('penggunaan_tanah', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kecamatan');
            $table->integer('id_kelurahan');
            $table->string('penggunaan');
            $table->string('sertifikat_milik');
            $table->string('penggunaan_tanah');
            $table->string('pemanfaatan_tanah');
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
        Schema::dropIfExists('penggunaan_tanah');
    }
};
