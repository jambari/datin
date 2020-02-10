<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSummary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summaries', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal')->unique();
            $table->integer('stroke');
            $table->float('average_stroke');
            $table->integer('flash')->flash();
            $table->float('average_flash')->flash();
            $table->integer('noise');
            $table->float('average_noise');
            $table->integer('energy');
            $table->float('average_energy');
            $table->integer('peak_stroke');
            $table->time('time_stroke');
            $table->integer('peak_flash')->nullable();
            $table->time('time_flash')->nullable();
            $table->integer('peak_noise');
            $table->time('time_noise');
            $table->integer('peak_energy');
            $table->time('time_energy');
            $table->integer('energy_ratio');
            $table->time('time_ratio');
            $table->integer('peak_signal');
            $table->time('time_signal');
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
        Schema::dropIfExists('summaries');
    }
}
