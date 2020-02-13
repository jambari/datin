<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableGempa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gempas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->time('origin');
            $table->float('lintang');
            $table->float('bujur');
            $table->float('magnitudo');
            $table->char('type')->nullable();
            $table->integer('depth');
            $table->char('ket');
            $table->boolean('terasa')->default(0);
            $table->char('terdampak')->nullable();
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
        Schema::dropIfExists('gempas');
    }
}
