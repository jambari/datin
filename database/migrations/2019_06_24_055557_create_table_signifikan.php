<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSignifikan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('significants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tanggal');
            $table->string('jam');
            $table->string('lintang');
            $table->string('bujur');
            $table->string('magnitudo');
            $table->integer('depth');
            $table->char('lokasi')->nullable();
            $table->char('dirasakan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('significants');
    }
}
