<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tahun extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //
        DB::table('tahun')->insert(
            ['thn_nama' => '2013']
        );
        DB::table('tahun')->insert(
            ['thn_nama' => '2014']
        );
        DB::table('tahun')->insert(
            ['thn_nama' => '2015']
        );
        DB::table('tahun')->insert(
            ['thn_nama' => '2016']
        );
        DB::table('tahun')->insert(
            ['thn_nama' => '2017']
        );
        DB::table('tahun')->insert(
            ['thn_nama' => '2018']
        );
        DB::table('tahun')->insert(
            ['thn_nama' => '2019']
        );
        DB::table('tahun')->insert(
            ['thn_nama' => '2020']
        );
        DB::table('tahun')->insert(
            ['thn_nama' => '2021']
        );
        DB::table('tahun')->insert(
            ['thn_nama' => '2022']
        );
        DB::table('tahun')->insert(
            ['thn_nama' => '2023']
        );
        DB::table('tahun')->insert(
            ['thn_nama' => '2024']
        );
    }
}
