<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class spp_alldata extends Model
{
    //
    public $timestamps = false;

    protected $fillable = ['NIS', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    protected $table = 'spp_alldata';

    public function dataSiswa(){
        return $this->belongsTo('App\get_dataSiswa', 'NIS', 'NIS');
    }

    public function tahunPembelajaran(){
        return $this->belongsTo('App\get_tahun', 'id_thn','id_thn');
    }
}
