<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSunrisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sunrises', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal')->nullable();
            $table->char('kota')->nullable();
            $table->char('terbit')->nullable();
            $table->char('terbenam')->nullable();
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
        Schema::dropIfExists('sunrises');
    }
}
