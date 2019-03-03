<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('transactions', function (Blueprint $table){
            $table->increments('id_trans');
            $table->string('NISN', 14);
            $table->decimal('dibayar', 14, 2);
            $table->date('tgl_bayar');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('NISN')->references('NISN')->on('data_siswa');
            $table->foreign('tahun')->references('id_thn')->on('tahun');
            $table->foreign('bulan')->references('id_bln')->on('bulan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('transactions');
    }
}
