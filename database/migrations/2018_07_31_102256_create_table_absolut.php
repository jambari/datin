<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAbsolut extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absoluts', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->float('komponen_h')->nullable();
            $table->float('komponen_d')->nullable();
            $table->float('komponen_i')->nullable();
            $table->float('komponen_z')->nullable();
            $table->float('komponen_f')->nullable();
            $table->char('pengamat')->nullable();
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
        Schema::dropIfExists('absoluts');
    }
}
