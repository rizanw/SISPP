<?php

use Illuminate\Database\Seeder;

class bulan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('bulan')->insert(
            ['bln_nama' => 'Januari']
        );
        DB::table('bulan')->insert(
            ['bln_nama' => 'Februari']
        );
        DB::table('bulan')->insert(
            ['bln_nama' => 'Maret']
        );
        DB::table('bulan')->insert(
            ['bln_nama' => 'April']
        );
        DB::table('bulan')->insert(
            ['bln_nama' => 'Mei']
        );
        DB::table('bulan')->insert(
            ['bln_nama' => 'Juni']
        );
        DB::table('bulan')->insert(
            ['bln_nama' => 'Juli']
        );
        DB::table('bulan')->insert(
            ['bln_nama' => 'Agustus']
        );
        DB::table('bulan')->insert(
            ['bln_nama' => 'September']
        );
        DB::table('bulan')->insert(
            ['bln_nama' => 'Oktober']
        );
        DB::table('bulan')->insert(
            ['bln_nama' => 'November']
        );
        DB::table('bulan')->insert(
            ['bln_nama' => 'Desember']
        );
    }
}
