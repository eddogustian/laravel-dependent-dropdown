<?php

use Illuminate\Support\Facades\Route;
use App\Category;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $categoris = Category::where('parent_id',0)->get();
    
    return view('welcome',["categoris" => $categoris]);
});

Route::post('/subcat', function (Request $request) {

    $parent_id = $request->cat_id;
    
    $subcategories = Category::where('id',$parent_id)
                          ->with('subcategories')
                          ->get();

    return response()->json([
        'subcategories' => $subcategories
    ]);
   
})->name('subcat');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dropdown/index', 'DropDownController@getIndex')->name('dropdown');

Route::get('/indonesia','CountryController@provinces');
Route::get('/json-regencies','CountryController@regencies');
Route::get('/json-districts', 'CountryController@districts');
Route::get('/json-village', 'CountryController@villages');

