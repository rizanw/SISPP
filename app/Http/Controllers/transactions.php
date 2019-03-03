<?php

namespace App\Http\Controllers;

use App\get_dataSiswa;
use App\get_Summary;
use App\get_tahun;
use App\get_transactions;
use App\get_uangSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class transactions extends Controller{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $id_biaya = DB::table('data_siswa')->select('biaya_us')->get();
        $biaya_us = $id_biaya->biayaSPP->biaya_us;
        dd($biaya_us);
    }

    public function addTahunAajaran(){
        $nisn = Input::get('NISN');
        $thnajaran = Input::get('tahunajaran');
        $angkatan = get_Summary::where('NISN', $nisn)->where('id_thn', $thnajaran)->count();

        if($angkatan == 0){
            $post = get_Summary::create(array(
                'NISN' => Input::get('NISN'),
                'Januari' => '0',
                'Februari' => '0',
                'Maret' => '0',
                'April' => '0',
                'Mei' => '0',
                'Juni' => '0',
                'Juli' => '0',
                'Agustus' => '0',
                'September' => '0',
                'Oktober' => '0',
                'November' => '0',
                'Desember' => '0',
                'id_thn' => Input::get('tahunajaran'),
            ));
            return redirect()->route('home')->with('success', 'tahun ajaran seorang siswa berhasil ditambahkan!');
        }else{
            return redirect('home');
        }
    }

    public function showTrans($nisn){
        $trans = get_transactions::find($nisn);
        return view('transaksi', ['trans' => $trans]);
    }

    public function addTransaction(){
        $lunas = 1;

        $nisn = Input::get('NISN');
        $bulan = Input::get('utkBulan');

        $post = get_transactions::create(array(
            'NISN' => $nisn,
            'dibayar' => Input::get('jumlahByr'),
            'tgl_bayar' => Input::get('tglBayar'),
            'bulan' => $bulan,
            'tahun' => Input::get('utkTahun'),
            'status' => $lunas,
        ));

        if($bulan == 1){
            DB::table('summary')
                ->where('NISN', $nisn)
                ->update([
                    'Januari' => 1
                ]);
        }elseif ($bulan == 2){
            DB::table('summary')
                ->where('NISN', $nisn)
                ->update([
                    'Februari' => 1
                ]);
        }elseif ($bulan == 3){
            DB::table('summary')
                ->where('NISN', $nisn)
                ->update([
                    'Maret' => 1
                ]);
        }elseif ($bulan == 4){
            DB::table('summary')
                ->where('NISN', $nisn)
                ->update([
                    'April' => 1
                ]);
        }elseif ($bulan == 5){
            DB::table('summary')
                ->where('NISN', $nisn)
                ->update([
                    'Mei' => 1
                ]);
        }elseif ($bulan == 6){
            DB::table('summary')
                ->where('NISN', $nisn)
                ->update([
                    'Juni' => 1
                ]);
        }elseif ($bulan == 7){
            DB::table('summary')
                ->where('NISN', $nisn)
                ->update([
                    'Juli' => 1
                ]);
        }elseif ($bulan == 8){
            DB::table('summary')
                ->where('NISN', $nisn)
                ->update([
                    'Agustus' => 1
                ]);
        }elseif ($bulan == 9){
            DB::table('summary')
                ->where('NISN', $nisn)
                ->update([
                    'September' => 1
                ]);
        }elseif ($bulan == 10){
            DB::table('summary')
                ->where('NISN', $nisn)
                ->update([
                    'Oktober' => 1
                ]);
        }elseif ($bulan == 11){
            DB::table('summary')
                ->where('NISN', $nisn)
                ->update([
                    'November' => 1
                ]);
        }elseif ($bulan == 12){
            DB::table('summary')
                ->where('NISN', $nisn)
                ->update([
                    'Desember' => 1
                ]);
        }

        return redirect('home');
    }

}
