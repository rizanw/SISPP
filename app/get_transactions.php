<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class get_transactions extends Model
{
    //
    protected $fillable = [
        'NISN',
        'dibayar',
        'tgl_bayar',
        'bulan',
        'tahun',
        'status'
    ];
    protected $table = "transactions";

    public function tahunAjaran(){
        return $this->belongsTo('App\get_tahun', 'tahun','id_thn');
    }


    public function padaBulan(){
        return $this->belongsTo('App\get_bulan', 'bulan','id_bln');
    }


}
