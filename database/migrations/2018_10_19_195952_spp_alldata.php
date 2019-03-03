<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SppAlldata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('summary', function (Blueprint $table){
            $table->increments('id_alld');
            $table->string('NISN', 14);
            $table->boolean('Januari');
            $table->boolean('Februari');
            $table->boolean('Maret');
            $table->boolean('April');
            $table->boolean('Mei');
            $table->boolean('Juni');
            $table->boolean('Juli');
            $table->boolean('Agustus');
            $table->boolean('September');
            $table->boolean('Oktober');
            $table->boolean('November');
            $table->boolean('Desember');
            $table->integer('id_thn');

            $table->foreign('NISN')->references('NISN')->on('data_siswa');
            $table->foreign('id_thn')->references('id_thn')->on('tahun');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('summary');
    }
}
