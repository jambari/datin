<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKindeks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kindeks', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal')->unique();
            $table->integer('k1')->nullable();
            $table->integer('k2')->nullable();
            $table->integer('k3')->nullable();
            $table->integer('k4')->nullable();
            $table->integer('k5')->nullable();
            $table->integer('k6')->nullable();
            $table->integer('k7')->nullable();
            $table->integer('k8')->nullable();
            $table->integer('aindex')->nullable();
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
        Schema::dropIfExists('kindeks');
    }
}
