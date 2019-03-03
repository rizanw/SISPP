<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tahun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //Schema::dropIfExists('tahun');
        Schema::create('tahun', function (Blueprint $table){
            $table->integer('id_thn')->autoIncrement();
            $table->string('thn_nama', 4);

//            $table->primary('id_thn');
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
        Schema::dropIfExists('tahun');
    }
}
