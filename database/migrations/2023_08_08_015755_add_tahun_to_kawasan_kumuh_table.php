<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// use DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kawasan_kumuh', function (Blueprint $table) {
            $table->integer('tahun')->after('id');
        });

        DB::table('kawasan_kumuh')->update(['tahun' => 2022]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kawasan_kumuh', function (Blueprint $table) {
            //
        });
    }
};
