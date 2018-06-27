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
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){
	Route::get('/home', 'HomeController@index')->name('home');

	Route::resource('documents', 'DocumentController');
	Route::get('documents/{document}/response', 'DocumentController@response')->name('documents.response');	
	Route::get('documents/showresponse/{document}', 'DocumentController@showresponse')->name('documents.showresponse');	
	Route::post('documents/responsedocument', 'DocumentController@responsedocument')->name('documents.response.document');	

});