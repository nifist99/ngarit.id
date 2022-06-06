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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('add-saran','AdminKritikSaranController@add_saran');

Route::get('detail_ternak/{kode}','PortofolioController@detail_ternak');

Route::get('detail_ternak_mitra/{kode}','PortofolioController@detail_ternak_mitra');

Route::get('detail_ternak_investor/{kode}','PortofolioController@detail_ternak_investor');

Route::get('marker','PortofolioController@getMarker');

Route::post('register','PortofolioController@register');

Route::get('activasi/{id}','PortofolioController@approve');

Route::get('registrasi','PortofolioController@registrasiPage');

Route::get('team','PortofolioController@teamPage');

Route::get('markermitra','PortofolioController@getMarkermitra');

Route::get('markerhome','PortofolioController@getMarkerhome');

Route::get('rapid/{id}','RapidController@rapid');
Route::get('rapid2/{id}','RapidController@rapid2');
Route::get('shope/kambing','ShopController@index');
Route::get('/','PortofolioController@index');