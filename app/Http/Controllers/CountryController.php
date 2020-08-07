<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Models\provinces;
use App\Models\Regencies;
use App\Models\Districts;
use App\Models\Villages;


class CountryController extends Controller
{
    public function provinces(){
        $provinces = Provinces::all();
        return view('indonesia', compact('provinces'));
    }
  
    public function regencies(Request $request){
        $provinces_id = $request->input('province_id');
        $regencies = Regencies::where('province_id', '=', $provinces_id)->get();
        return response()->json($regencies);
    }

    public function districts(Request $request){
        $regencies_id = $request->input('regencies_id');
        $districts = Districts::where('regency_id', '=', $regencies_id)->get();
        return response()->json($districts);
    }

    public function villages(Request $request){
        $districts_id = $request->input('districts_id');
        $villages = Villages::where('district_id', '=', $districts_id)->get();
        dd($villages);
        return response()->json($villages);
    }
}
