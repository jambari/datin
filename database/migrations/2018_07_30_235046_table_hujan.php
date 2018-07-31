<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableHujan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hujans', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal')->unique();
            $table->float('obs')->nullable();
            $table->float('hilman')->nullable();
            $table->string('kategori', 50)->default('nihil');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('hujans');
    }
}
