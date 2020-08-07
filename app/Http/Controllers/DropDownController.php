<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;


class DropDownController extends Controller
{
    public function getIndex() 
    {
        $provinsi = Provinsi::all();
        $daftar   = array();

        foreach($provinsi as $temp) 
            $daftar[$temp->id] = $temp->nama;
        return view('dropdown.index', compact('daftar'));
    }

    public function postDropdown()
    {
        # Tarik ID inputan
		$set = Input::get('id');

		# Inisialisasi variabel berdasarkan masing-masing tabel dari model
		# dimana ID target sama dengan ID inputan
		$kabupaten = Kabupaten::where('id_provinsi', $set)->get();
		$kecamatan = Kecamatan::where('id_kabupaten_kota', $set)->get();
        $kelurahan = Kelurahan::where('id_kecamatan', $set)->get();
        
        # Buat pilihan "Switch Case" berdasarkan variabel "type" dari form
		switch(Input::get('type')):
			# untuk kasus "kabupaten"
			case 'kabupaten':
				# buat nilai default
				$return = '<option value="">Pilih Kabupaten...</option>';
				# lakukan perulangan untuk tabel kabupaten lalu kirim
				foreach($kabupaten as $temp) 
					# isi nilai return
					$return .= "<option value='$temp->id'>$temp->nama</option>";
				# kirim
				return $return;
			break;
			# untuk kasus "kecamatan"
			case 'kecamatan':
				$return = '<option value="">Pilih Kecamatan...</option>';
				foreach($kecamatan as $temp) 
					$return .= "<option value='$temp->id'>$temp->nama</option>";
				return $return;
			break;
			# untuk kasus "kelurahan"
			case 'kelurahan':
				$return = '<option value="">Pilih Kelurahan...</option>';
				foreach($kelurahan as $temp) 
					$return .= "<option value='$temp->id'>$temp->nama</option>";
				return $return;
			break;
		# pilihan berakhir
		endswitch;  

    }
}
