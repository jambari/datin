<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBujurColumnInBalaigempasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('balaigempas', function (Blueprint $table) {
            $table->decimal('bujur', 8, 5)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('balaigempas', function (Blueprint $table) {
            $table->decimal('bujur', 5, 2)->change();
        });
    }
}
