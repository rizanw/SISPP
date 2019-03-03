<?php

namespace App\Http\Controllers;

use App\get_Summary;
use App\get_transactions;
use App\spp_alldata;
use App\get_dataSiswa;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;

class alldata_table extends Controller
{
    //
    public function index(){
        return view('home');
    }

    public function ajaxData(){
        $dataSiswa = get_dataSiswa::all();
        $spp_display = get_Summary::all();
        //dd($spp_display);
        $data = array();
        foreach ($spp_display as $key) {
            $data[] = array(
                'NISN' =>$key->NISN,
                'Nama'=>$key->dataSiswa->Nama,
                'Januari'=>$key->Januari,
                'Februari'=>$key->Februari,
                'Maret'=>$key->Maret,
                'April'=>$key->April,
                'Mei'=>$key->Mei,
                'Juni'=>$key->Juni,
                'Juli'=>$key->Juli,
                'Agustus'=>$key->Agustus,
                'September'=>$key->September,
                'Oktober'=>$key->Oktober,
                'November'=>$key->November,
                'Desember'=>$key->Desember,
                'Tahun'=>$key->tahunAjaran->thn_nama,
                'Jenjang'=>$key->dataSiswa->Jenjang
            );
        };

        echo(json_encode($data));
    }

    public function ajaxDataSiswa(){
        $dataSiswa = get_dataSiswa::all();
        $data = array();
        foreach ($dataSiswa as $key){
            $data[] = array(
                'NIS' => $key->NIS,
                'NISN' => $key->NISN,
                'Nama' => $key->Nama,
                'JK' => $key->JK,
                'tmptlahir' => $key->tmpt_lahir,
                'tgllahir' => $key->tgl_lahir,
                'alamat' => $key->Alamat,
                'kelas' => $key->Kelas,
                'jenjang' => $key->Jenjang,
                'angkatan' => $key->tahunAjaran->thn_nama,
                'SPP' => $key->biaya_us,
                'namaibu' => $key->ibu_siswa,
                'namabpk' => $key->bpk_siswa,
                'namawali' => $key->wali_siswa
            );
        };

        echo(json_encode($data));
    }

    public function ajaxDataTrans(Request $request){
        $nisn = $request->nisn;

        $trans = get_transactions::where('NISN',$nisn)->get();
        $data = array();

        foreach ($trans as $key){
            $data[]= array(
                'Riwayat' => $key->tgl_bayar,
                'Dibayar' => $key->dibayar,
                'Bulan' => $key->padaBulan->bln_nama,
                'Tahun' => $key->tahunAjaran->thn_nama,
            );
        };

        return (json_encode($data));
    }
}
