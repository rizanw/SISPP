<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('home/data-siswa','dataSiswa@index')->name('dataSiswa');
Route::post('home/data-siswa','dataSiswa@addSiswa')->name('dataSiswa');
Route::post('home/addPaketSPP','dataSiswa@addPaketSPP')->name('addPaketSPP');

Route::post('transaksi','transactions@addTransaction')->name('transaksi');
Route::get('ajaxData', 'alldata_table@ajaxData');

Route::post('ajaxDataTrans', 'alldata_table@ajaxDataTrans');
Route::get('ajaxDataTrans', 'alldata_table@ajaxDataTrans');
Route::get('ajaxDataSiswa', 'alldata_table@ajaxDataSiswa');

Route::get('/home/trans/detail/{nisn}', 'transactions@showTrans')->name('trans.detail');

Route::post('transaksi/addTahunAjaran', 'transactions@addTahunAajaran')->name('addTahunAjaran');
