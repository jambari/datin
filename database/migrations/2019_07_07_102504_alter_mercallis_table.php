<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMercallisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mercallis', function (Blueprint $table) {
            $table->dropColumn(['gempa_id','lintang','bujur']);
            $table->integer('gempabalai_id')->nullable()->after('id');
            $table->string('nama')->nullable()->after('gempabalai_id');
            $table->json('lokasi')->nullable()->after('nama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mercallis', function (Blueprint $table) {
            //
        });
    }
}
