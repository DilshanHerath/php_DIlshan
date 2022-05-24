<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::resource('/','App\Http\Controllers\SellerController');
Route::get('/',"App\Http\Controllers\SellerController@index");
Route::get('/show/{id}',"StudentController@show");
Route::post('/store',"App\Http\Controllers\SellerController@store");
Route::post('/update/{id}',"App\Http\Controllers\SellerController@update");
Route::post('/destroy/{id}',"App\Http\Controllers\SellerController@destroy");
