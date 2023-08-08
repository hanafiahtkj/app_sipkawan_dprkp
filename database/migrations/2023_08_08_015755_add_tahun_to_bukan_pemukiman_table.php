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
        Schema::table('bukan_pemukiman', function (Blueprint $table) {
            $table->integer('tahun')->after('status_kepemilikan');
        });

        DB::table('bukan_pemukiman')->update(['tahun' => 2022]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bukan_pemukiman', function (Blueprint $table) {
            //
        });
    }
};
