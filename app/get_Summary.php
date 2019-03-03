<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class get_Summary extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'NISN',
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember',
        'id_thn'
    ];
    protected $table = 'summary';

    public function dataSiswa(){
        return $this->belongsTo('App\get_dataSiswa', 'NISN', 'NISN');
    }

    public function tahunAjaran(){
        return $this->belongsTo('App\get_tahun', 'id_thn','id_thn');
    }

}
