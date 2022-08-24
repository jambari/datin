<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGempasorongs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gempasorongs', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->string('origin');
            $table->string('lintang');
            $table->string('bujur');
            $table->decimal('magnitudo',2,1);
            $table->char('type')->nullable();
            $table->integer('depth');
            $table->char('ket')->nullable();
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
        Schema::dropIfExists('gempasorongs');
    }
}
