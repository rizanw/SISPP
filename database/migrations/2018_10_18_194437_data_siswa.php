<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::dropIfExists('data_siswa');
        Schema::create('data_siswa', function(Blueprint $table){
            $table->string('NISN',10);
            $table->string('NIS', 14);
            $table->string('Nama', 150);
            $table->string('JK',1);
            $table->string('tmpt_lahir',100);
            $table->date('tgl_lahir');
            $table->string('Alamat',200);
            $table->string('ibu_siswa',150);
            $table->string('bpk_siswa',150);
            $table->string('wali_siswa',150)->nullable($value = true);
            $table->string('Kelas',4);
            $table->string('Jenjang', 3);
            $table->string('Tahun_Masuk', 4);
            $table->integer('biaya_us')->nullable($value = true)	;
            $table->binary('foto')->nullable($value = true);
            $table->timestamps();

            $table->primary('NISN');
            $table->foreign('biaya_us')->references('id_us')->on('uang_sekolah');
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
        Schema::dropIfExists('data_siswa');
    }
}
