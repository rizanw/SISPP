<?php

namespace App\Http\Controllers;

use App\get_dataSiswa;
use App\get_Summary;
use App\get_tahun;
use App\get_uangSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;

class dataSiswa extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $tahun = get_tahun::all();
        $spp = get_uangSekolah::all();

        return view('dataSiswa')
            ->with(compact('tahun'))
            ->with(compact('spp'));
    }

    public function addSiswa(){
        $post = get_dataSiswa::create(array(
            'NIS' => Input::get('NIS'),
            'NISN' => Input::get('NISN'),
            'Nama' => Input::get('Nama'),
            'JK' => Input::get('JK'),
            'tmpt_lahir' => Input::get('TLahir'),
            'tgl_lahir' => Input::get('TglLahir'),
            'Alamat' => Input::get('Alamat'),
            'ibu_siswa' => Input::get('NamaIbu'),
            'bpk_siswa' => Input::get('NamaBpk'),
            'wali_siswa' => Input::get('NamaWali'),
            'Kelas' => Input::get('Kelas'),
            'Jenjang' => Input::get('Jenjang'),
            'Tahun_Masuk' => Input::get('Angkatan'),
            'biaya_us' => Input::get('spp'),
            'foto' => Input::get('foto'),
        ));


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
            'id_thn' => Input::get('Angkatan'),
        ));

        return redirect()->route('dataSiswa')->with('success', 'Siswa Berhasil ditambahkan!');
    }

    public function addPaketSPP(){
        $post = get_uangSekolah::create(array(
            'nama_us' => Input::get('nama_us'),
            'biaya_us' => Input::get('biaya_us')
        ));

        return redirect()->route('dataSiswa')->with('success', 'Paket SPP Berhasil ditambahkan!');
    }
}
