<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    # Tembak isi database berdasarkan tabel  
    protected $table = 'kabupaten_kota';
    # Disable fungsi timestamps
    public $timestamps = false;
}
