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

// Route::get('/test_agent', 'TestController@testfunc');
// Route::get('test_xml', 'TestController@test');

Route::get('/test_user/{room}/{site}', 'TestController@test_xml');
Route::get('/testing', 'TestController@testing');

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
Route::get('/Cozumel', function () {
	$site = 'CZ';
    return view('visitor.Palace.cozumel', compact('site'));
});
Route::get('/Cozumel_test', function () {
    $site = 'CZ';
    return view('visitor.Palace.cozumel_test', compact('site'));
});
Route::get('/Playacar', function () {
	$site = 'PL';
    return view('visitor.Palace.playacar', compact('site'));
});
Route::get('/Bluebay', function () {
    $site = 'BGE';
    return view('visitor.Bluebay.bluebay', compact('site'));
});
Route::get('/Unitec', function () {
    $site = 'UTEC';
    return view('visitor.Unitec.unitec', compact('site'));
});
Route::get('/Fontan', function () {
    $site = 'FONT';
    return view('visitor.Fontan.fontan', compact('site'));
});
Route::get('/CentralNorte', function () {
    $site = 'Central';
    return view('visitor.CentralNorte.intro_central', compact('site'));
});
Route::get('/HaciendaEncantada', function(){
    $site = 'Hacienda';
    return view('visitor.Hacienda.hacienda_new', compact('site'));
});
Route::get('HaciendaPremium', function(){
    $site = 'Hacienda_pre';
    return view('visitor.Hacienda.hacienda_pay', compact('site')); 
});

Route::post('submit_fontan_test', 'TestController@test_logeo');
Route::post('submit_unitec', 'UnitecController@login_unitec');
Route::post('validate_correo', 'BlueController@validate_email');
Route::post('submit_bluebay', 'BlueController@login_bluebay');
Route::post('submit_palace', 'PalaceController@login_palace');

Route::post('/submit_palace_test', 'PalaceController@login_palace_test');

Auth::routes(['register' => false]);
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    // Rutas de sistema de control.
});
