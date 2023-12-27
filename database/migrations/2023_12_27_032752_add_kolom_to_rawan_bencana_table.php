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
        Schema::table('rawan_bencana', function (Blueprint $table) {
            $table->integer('kondisi_rlh')->default(0)->nullable()->after('status_kepemilikan');
            $table->integer('kondisi_rtlh')->default(0)->nullable()->after('kondisi_rlh');
            $table->integer('status_milik')->default(0)->nullable()->after('kondisi_rtlh');
            $table->integer('status_sewa')->default(0)->nullable()->after('status_milik');
        });
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
