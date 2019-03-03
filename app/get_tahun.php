<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class get_tahun extends Model
{
    //
    protected $fillable = ['id_thn', 'thn_nama'];
    protected $table = 'tahun';
}
