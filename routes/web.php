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

Route::prefix('dashboard_freewifi')->group(function() {
    Route::get('gs', 'DashboardFreeWifiController@index');
    Route::get('hotspot/realms', 'DashboardFreeWifi\GoogleStationController@getRealms');
    Route::get('hotspot/realm_sites','DashboardFreeWifi\GoogleStationController@getRealmSites');
    Route::get('hotspot/chartsInfo', 'DashboardFreeWifi\GoogleStationController@getChartsInfo');

    Route::get('sessions','DashboardFreeWifiController@sessions'); // borrar???
    Route::get('users','DashboardFreeWifiController@users');
    Route::get('devices','DashboardFreeWifiController@devices');

    Route::get('test_echart','DashboardFreeWifiController@index2');
    Route::get('metrorrey', 'DashboardFreeWifiController@index3');

    Route::get('sessions_report','DashboardFreeWifiController@sessions_report');
    Route::get('testing_px','DashboardFreeWifiController@testing');
});

//Route::get('test_echart','DashboardFreeWifiController@index2');
Route::post('hotels_by_cadena', 'DashboardFreeWifiController@get_hotelsbycadena');
Route::post('get_graph_browsers', 'DashboardFreeWifiController@get_browsers');
Route::post('get_graph_platforms', 'DashboardFreeWifiController@get_platforms');
Route::post('get_graph_countries', 'DashboardFreeWifiController@get_countries');
Route::post('get_graph_devices', 'DashboardFreeWifiController@get_devices');

Route::post('get_graph_ages', 'DashboardFreeWifiController@get_ages');
Route::post('get_graph_domains', 'DashboardFreeWifiController@get_domains');
Route::post('get_graph_genders', 'DashboardFreeWifiController@get_genders');
//Route::post('get_graph_mobiles', 'DashboardFreeWifiController@get_mobiles');
Route::post('get_graph_languages', 'DashboardFreeWifiController@get_languages');
Route::post('get_graph_sessions', 'DashboardFreeWifiController@get_sessions');  // 1. primer procedure

Route::post('get_grap_hotspot', 'DashboardFreeWifiController@hotspotGraphicData');


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
Route::get('/Mahekal', function () {
    $site = 'MHK';
    return view('visitor.Mahekal.mahekal', compact('site'));
});
Route::get('/Mahekal_vip', function () {
    $site = 'MHKVIP';
    return view('visitor.Mahekal.mahekal_vip', compact('site'));
});
Route::get('/Unitec', function () {
    $site = 'UTEC';
    return view('visitor.Unitec.unitec', compact('site'));
});
Route::get('/Portal_UVM', function () {
    $site = 'UVM';
    return view('visitor.Unitec.uvm_view', compact('site'));
});
Route::get('/Fontan', function () {
    $site = 'FONT';
    return view('visitor.Fontan.fontan', compact('site'));
});
Route::get('/CentralNorte', function () {
    $site = 'Central';
    return view('visitor.CentralNorte.intro_central', compact('site'));
});

Route::get('/HaciendaEncantada/{lang}', function($lang){
    $html_title = 'Hacienda Encantada';
    App::setLocale($lang);
    $site = 'HE'; // Variable para extraer id de base de datos.
    $id_site = '1'; // Variable para cambio de imagenes.
    return view('visitor.Hacienda.hacienda_pay', compact('site', 'id_site', 'html_title'));
});
Route::get('/MarinaFiesta/{lang}', function($lang){
    $html_title = 'Marina Fiesta';
    App::setLocale($lang);
    $site = 'MF'; // Variable para extraer id de base de datos.
    $id_site = '2'; // Variable para cambio de imagenes.
    return view('visitor.Hacienda.hacienda_pay', compact('site', 'id_site', 'html_title'));
});

Route::get('/TheResidences/{lang}', function($lang){
    $html_title = 'The Residences';
    App::setLocale($lang);
    $site = 'RESI'; // Variable para extraer id de base de datos.
    $id_site = '3'; // Variable para cambio de imagenes.
    return view('visitor.Hacienda.hacienda_pay', compact('site', 'id_site', 'html_title'));
});

Route::get('/VistaEncantada/{lang}', function($lang){
    $html_title = 'Vista Encantada';
    App::setLocale($lang);
    $site = 'VE'; // Variable para extraer id de base de datos.
    $id_site = '4'; // Variable para cambio de imagenes.
    return view('visitor.Hacienda.hacienda_pay', compact('site', 'id_site', 'html_title'));
});
//test locale.
Route::get('/HaciendaPremium/{lang}', function($lang){
    $html_title = 'Test Locale';
    App::setLocale($lang);
    $site = 'HE';
    $id_site = '1';
    return view('visitor.Hacienda.hacienda_pay', compact('site','id_site', 'html_title'));
});
Route::get('hacienda_paquetes', 'HaciendaController@index');
Route::post('/get_paquetes_month','HaciendaController@getPaquetesMonth');
Route::post('/get_paquetes_all','HaciendaController@getPaquetesAll');

Route::get('/hacienda_logout/{lang}', function($lang){
    $html_title = 'Hacienda Logout';
    App::setLocale($lang);
    $site = 'HE_L'; // Variable para extraer id de base de datos.
    $id_site = '0'; // Variable para cambio de imagenes.

    return view('visitor.Hacienda.hacienda_logout', compact('site', 'id_site', 'html_title'));
});
Route::get('/fidelis', function(){
    return view('visitor.Demo.xtech');
});

Route::get('/Isec', function(){
   return view('visitor.Isec.isec');
});

Route::get('/Nyx_test', function(){
  $html_title = 'NYX Hotel';
  //App::setLocale($lang);
  $site = 'HE';
  $id_site = '1';
  return view('visitor.Nyx.nyx', compact('site','id_site', 'html_title'));
});

Route::get('/FreeWifi','FreeWifiController@get_freewifi_blade');
Route::get('/Metrorrey','FreeWifiController@get_metrorrey_blade');
Route::get('/Metrobus','FreeWifiController@get_metrobus_blade');
Route::get('/ADO','FreeWifiController@get_ado_blade');
Route::get('/Aryba','FreeWifiController@get_aryba_blade');

Route::get('/Alcaldia_ao','FreeWifiController@get_alcaldia_blade');
Route::get('/Asur','FreeWifiController@get_asur_blade');

Route::get('/FreeWifi2', function(){
  return view('visitor.SitwifiFree.free_wifi');
});
Route::get('/Aeris_CR', function(){
  return view('visitor.Aeris.aeris');
});

Route::post('/try_login_hacienda', 'HaciendaController@try_login_hacienda');
Route::post('/submit_hacienda_free', 'HaciendaController@login_premium_free');
Route::post('/submit_hacienda_premium_1', 'HaciendaController@login_premium_1');
Route::post('/submit_hacienda_premium_2', 'HaciendaController@login_premium_2');
Route::post('/submit_hacienda_premium_3', 'HaciendaController@login_premium_3');
Route::post('/submit_hacienda_premium_4', 'HaciendaController@login_premium_4');

Route::post('submit_freewifi', 'FreeWifiController@login_freewifi');
Route::post('submit_fontan_test', 'TestController@test_logeo');
Route::post('submit_unitec', 'UnitecController@login_unitec');
Route::post('submit_uvm', 'UnitecController@login_uvm');
Route::post('validate_correo', 'BlueController@validate_email');
Route::post('submit_bluebay', 'BlueController@login_bluebay');
Route::post('submit_palace', 'PalaceController@login_palace');
Route::post('submit_mahekal', 'MahekalController@login_mahekal');
Route::post('submit_mahekal_vip', 'MahekalController@login_mahekal_vip');


Route::post('/submit_palace_test', 'PalaceController@testings');

Auth::routes(['register' => false]);
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    // Rutas de sistema de control.
});
