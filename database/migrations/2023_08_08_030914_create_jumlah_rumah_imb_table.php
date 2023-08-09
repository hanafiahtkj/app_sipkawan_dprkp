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
        Schema::create('jumlah_rumah_imb', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->integer('id_kecamatan');
            $table->integer('id_kelurahan');
            $table->integer('perorangan');
            $table->integer('pengembang');
            $table->string('sumber_data');
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
        Schema::dropIfExists('kependudukan');
    }
};
