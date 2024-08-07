<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalaiguetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balaiguests', function (Blueprint $table) {
            $table->increments('id');
            $table->char('nama');
            $table->char('dari');
            $table->char('keperluan');
            $table->text('keterangan')->nullable();
            $table->char('foto');
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
        Schema::dropIfExists('balaiguests');
    }
}
