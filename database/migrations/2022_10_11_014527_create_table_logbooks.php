<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLogbooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logbooks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tanggal');
            $table->string('jadwal_dinas');
            $table->string('petugas');
            $table->string('seiscomp');
            $table->string('nexstorm_petir');
            $table->string('accelero_system');
            $table->string('dvb');
            $table->string('jamstec');
            $table->string('jiesview');
            $table->string('diseminasi');
            $table->string('esdx');
            $table->string('magdas');
            $table->string('lemi');
            $table->string('hillman');
            $table->string('obs');
            $table->string('arws');
            $table->string('hv_sampler');
            $table->string('listrik_genset');
            $table->string('internet');
            $table->string('telefon');
            $table->string('ac');
            $table->string('air');
            $table->string('cctv');
            $table->string('intensitas_hujan');
            $table->string('data_nexstorm');
            $table->string('data_jamstec');
            $table->string('data_seismisitas');
            $table->integer('berat_kertas')->nullable();
            $table->integer('counter_awal')->nullable();
            $table->integer('counter_akhir')->nullable();
            $table->integer('flow_rate_awal')->nullable();
            $table->integer('flow_rate_akhir')->nullable();
            $table->integer('hillman_intensitas')->nullable();
            $table->integer('obs_intensitas')->nullable();
            $table->string('armi');
            $table->string('arpi');
            $table->string('baki');
            $table->string('bndi');
            $table->string('dypi');
            $table->string('erpi');
            $table->string('faki');
            $table->string('fkmpm');
            $table->string('geni');
            $table->string('glmi');
            $table->string('iwpi');
            $table->string('jay');
            $table->string('kmpi');
            $table->string('kmsi');
            $table->string('krai');
            $table->string('ljpi');
            $table->string('mbpi');
            $table->string('mipi');
            $table->string('mmpi');
            $table->string('msai');
            $table->string('mtn');
            $table->string('nbpi');
            $table->string('rapi');
            $table->string('rkpi');
            $table->string('sani');
            $table->string('saui');
            $table->string('sjpm');
            $table->string('skpm');
            $table->string('smpi');
            $table->string('srpi');
            $table->string('stpi');
            $table->string('swi');
            $table->string('tami');
            $table->string('tle2');
            $table->string('tnti');
            $table->string('tspi');
            $table->string('wami');
            $table->string('wwpi');
            $table->string('website');
            $table->string('media_sosial');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('logbooks');
    }
}
