<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSatudatagempasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satudatagempas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->string('origin');
            $table->string('lintang');
            $table->string('bujur');
            $table->decimal('magnitudo',2,1);
            $table->integer('depth');
            $table->char('ket')->nullable();
            $table->string('sumber')->nullable();
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
        Schema::dropIfExists('satudatagempas');
    }
}
