<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDeklinasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deklinasis', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal')->unique();
            $table->float('jam00')->nullable();
            $table->float('jam01')->nullable();
            $table->float('jam02')->nullable();
            $table->float('jam03')->nullable();
            $table->float('jam04')->nullable();
            $table->float('jam05')->nullable();
            $table->float('jam06')->nullable();
            $table->float('jam07')->nullable();
            $table->float('jam08')->nullable();
            $table->float('jam09')->nullable();
            $table->float('jam10')->nullable();
            $table->float('jam11')->nullable();
            $table->float('jam12')->nullable();
            $table->float('jam13')->nullable();
            $table->float('jam14')->nullable();
            $table->float('jam15')->nullable();
            $table->float('jam16')->nullable();
            $table->float('jam17')->nullable();
            $table->float('jam18')->nullable();
            $table->float('jam19')->nullable();
            $table->float('jam20')->nullable();
            $table->float('jam21')->nullable();
            $table->float('jam22')->nullable();
            $table->float('jam23')->nullable();
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
        Schema::dropIfExists('deklinasis');
    }
}
