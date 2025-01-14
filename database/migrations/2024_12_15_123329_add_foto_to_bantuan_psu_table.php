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
        Schema::table('bantuan_psu', function (Blueprint $table) {
            $table->string('foto_rumah_path')->nullable()->after('jenis_sarana');
            $table->string('foto_psu_path')->nullable()->after('foto_rumah_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bantuan_psu', function (Blueprint $table) {
            //
        });
    }
};
