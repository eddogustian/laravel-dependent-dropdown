<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    # Tembak isi database berdasarkan tabel  
    protected $table = 'kecamatan';
    # Disable fungsi timestamps
    public $timestamps = false;
}
