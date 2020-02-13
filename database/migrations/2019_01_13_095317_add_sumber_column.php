<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSumberColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gempas', function (Blueprint $table) {
            $table->string('sumber')->nullable()->after('narasi');
            $table->string('petugas')->nullable()->after('sumber');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gempas', function (Blueprint $table) {
            //
        });
    }
}
