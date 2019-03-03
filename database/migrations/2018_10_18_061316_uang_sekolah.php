<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UangSekolah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::dropIfExists('uang_sekolah');
        Schema::create('uang_sekolah', function (Blueprint $table){
            $table->integer('id_us')->autoIncrement();
            $table->string('nama_us',50);
            $table->decimal('biaya_us',14,2);
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
        //
        Schema::dropIfExists('uang_sekolah');
    }
}
