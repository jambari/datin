<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMagnetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magnets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tahun')->nullable();
            $table->integer('bulan')->nullable();
            $table->integer('hari')->nullable();
            $table->integer('jam')->nullable();
            $table->decimal('kompx', 7,2)->nullable();
            $table->decimal('kompy', 6, 2)->nullable();
            $table->decimal('kompz', 7, 2)->nullable();
            $table->decimal('komph', 7, 2)->nullable();
            $table->decimal('kompf', 7, 2)->nullable();
            $table->decimal('kompd', 3, 2)->nullable();
            $table->decimal('kompi', 4, 2)->nullable();
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
        Schema::dropIfExists('magnets');
    }
}
