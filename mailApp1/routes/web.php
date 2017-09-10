<?php

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
	return view('home');
});
Route::get('/mail', 'Front@sendMail');

Route::get('api/sendtabledata','Front@tableData');

Route::get('panel', function(){
	return view('panel');
});

Route::post('/subscribe', 'Front@store');

Route::get('/thank',function(){
	return view('thank');
});

Route::post('/sendmail', 'Front@sendSubMail');

Route::post('/csv', 'Front@saveCSV');