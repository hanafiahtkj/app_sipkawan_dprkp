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
        Schema::table('rtlh', function (Blueprint $table) {
            $table->integer('tahun')->after('id');
        });

        DB::table('rtlh')->update(['tahun' => 2022]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rtlh', function (Blueprint $table) {
            //
        });
    }
};
