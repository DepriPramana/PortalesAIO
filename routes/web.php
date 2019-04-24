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

Route::get('test_agent', 'TestController@testfunc');
Route::get('test_xml', 'TestController@test_xml');

Route::get('/clear-cache', function() {
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// Route::get('/', function () {return view('welcome');});

Route::get('/Jamaica', function () {
	$site = 'ZCJG';
    return view('visitor.Palace.jamaica', compact('site'));
});
Route::post('submit_palace', 'PalaceController@login_palace');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
	
});
