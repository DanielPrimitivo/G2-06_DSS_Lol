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

Route::get('/campeones', 'ChampionController@index')->name('champions');

Route::get('/campeones/{champion}', 'ChampionController@show')
    ->where('champion', '[0-9]+')->name('champion.details');

Route::get('/campeones/crear', 'ChampionController@create');

Route::get('/objetos', 'ObjectController@index')->name('objects');

Route::get('/objetos/{id}', 'ObjectController@show')
    ->where('id', '[0-9]+')->name('objetc.details');

Route::get('/objetos/crear', 'ObjectController@create');

Route::get('/runas', 'RuneController@index')->name('runes');

Route::get('/runas/{id}', 'RuneController@show')
    ->where('id', '[0-9]+')->name('rune.details');

Route::get('/runas/crear', 'RuneController@create');