<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kahs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tahun');
            $table->string('bulan');
            $table->char('minggu',3);
            $table->char('stasiun', 250); 
            $table->char('lokasi',100);
            $table->float('peha')->nullable();
            $table->float('deha')->nullable();
            $table->float('ce_a')->nullable();
            $table->float('emge')->nullable();
            $table->float('en_a')->nullable();
            $table->float('ka_a')->nullable();
            $table->float('enha_empat')->nullable();
            $table->float('ce_el')->nullable();
            $table->float('so_empat')->nullable();
            $table->float('no_tiga')->nullable();
            $table->float('ka_te')->nullable();
            $table->float('ac_ac')->nullable();
            $table->float('al_al')->nullable();
            $table->float('ce_ha')->nullable();
            $table->float('ox_ox')->nullable();  
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
        Schema::dropIfExists('kahs');
    }
}
