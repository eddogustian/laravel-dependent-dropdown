<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
     # Tembak isi database berdasarkan tabel  
     protected $table = 'provinsi';
     # Disable fungsi timestamps
     public $timestamps = false;
}
