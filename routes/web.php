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

Route::get('/campeones', 'ChampionController@index');

Route::get('/campeones/{id}', 'ChampionController@show')
    ->where('id', '[0-9]+');

Route::get('/campeones/crear', 'ChampionController@create');

Route::get('/objetos', 'ObjectController@index');

Route::get('/objetos/{id}', 'ObjectController@show')
    ->where('id', '[0-9]+');

Route::get('/objetos/crear', 'ObjectController@create');

Route::get('/runas', 'RuneController@index');

Route::get('/runas/{id}', 'RuneController@show')
    ->where('id', '[0-9]+');

Route::get('/runas/crear', 'RuneController@create');