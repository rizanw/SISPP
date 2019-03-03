<?php

namespace App\Http\Controllers;

use App\get_bulan;
use App\get_dataSiswa;
use App\get_tahun;
use App\get_transactions;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    {
        $siswa = get_dataSiswa::all();
        $tahun = get_tahun::all();
        $bulan = get_bulan::all();
        $transaksi = get_transactions::all();
        $i = 1;

        return view('home')
            ->with(compact('siswa'))
            ->with(compact('tahun'))
            ->with(compact('bulan'))
            ->with(compact('transaksi'))
            ->with(compact('i'));
    }
}
