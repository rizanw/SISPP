<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class get_uangSekolah extends Model
{
    //
    protected $fillable = ['nama_us', 'biaya_us'];
    protected $table = 'uang_sekolah';
}
