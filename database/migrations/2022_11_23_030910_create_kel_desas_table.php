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
        Schema::create('kel_desas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_deskel');
            $table->string('nama_deskel');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('kec_kode');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kel_desas');
    }
};
