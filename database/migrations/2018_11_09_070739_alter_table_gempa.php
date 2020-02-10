<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableGempa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gempas', function (Blueprint $table) {
            $table->date('tanggal')->change();
            $table->string('origin')->change();
            $table->string('lintang')->change();
            $table->decimal('bujur',5,2)->change();
            $table->decimal('magnitudo',2,1)->change();
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
