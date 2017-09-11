<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::post('/subscribe', 'MailController@store');
Route::get('/thank',function(){
	return view('thank');
});

Route::post('/test',function(){
	echo Request::input('name');
});


Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');

Route::get('panel', function(){
	return view('panel');
});

Route::get('api/sendtabledata','MailController@tableData');