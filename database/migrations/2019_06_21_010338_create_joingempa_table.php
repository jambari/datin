<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoingempaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joingempas', function (Blueprint $table) {
            $table->increments('id');
            $table->char('sumber')->nullable();
            $table->date('tanggal');
            $table->string('origin');
            $table->string('lintang');
            $table->decimal('bujur',5,2);
            $table->decimal('magnitudo',2,1);
            $table->char('type')->nullable();
            $table->integer('depth');
            $table->char('ket')->nullable();
            $table->char('eliplat')->nullable();
            $table->char('eliplon')->nullable();
            $table->char('rms');
            $table->char('elipdepth');
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
        Schema::dropIfExists('joingempa');
    }
}
