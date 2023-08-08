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
        Schema::table('rawan_bencana', function (Blueprint $table) {
            $table->integer('tahun')->after('jenis');
        });

        DB::table('rawan_bencana')->update(['tahun' => 2022]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rawan_bencana', function (Blueprint $table) {
            //
        });
    }
};
