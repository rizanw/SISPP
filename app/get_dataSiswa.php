<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class get_dataSiswa extends Model
{
    //
    protected $fillable = [
        'NIS',
        'NISN',
        'Nama',
        'JK',
        'tmpt_lahir',
        'tgl_lahir',
        'Alamat',
        'ibu_siswa',
        'bpk_siswa',
        'wali_siswa',
        'Kelas',
        'Jenjang',
        'Tahun_Masuk',
        'biaya_us',
        'foto'
    ];
    protected $table = 'data_siswa';

    public function tahunAjaran(){
        return $this->belongsTo('App\get_tahun', 'Tahun_Masuk','id_thn');
    }


    public function biayaSPP(){
        return $this->belongsTo('App\get_uangSekolah', 'biaya_us','id_us');
    }
}
