<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    # Tembak isi database berdasarkan tabel  
    protected $table = 'kelurahan_desa';
    # Disable fungsi timestamps
    public $timestamps = false;
}
