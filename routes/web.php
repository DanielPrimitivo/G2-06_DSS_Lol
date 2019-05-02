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

/** ************************** ROUTES INITIALS ************************** */


Route::get('/', function () {
    return view('home');
});

Route::get('/admin', function () {
    return view('homeadmin');
});

/** ************************** ROUTES CHAMPIONS ************************** */

Route::get('/campeones', 'ChampionController@index')->name('champions');

Route::get('/campeonesOrder', 'ChampionController@listAlphabetical')->name('champions.order');

Route::get('/campeones/{champion}', 'ChampionController@show')
    ->where('champion', '[0-9]+')->name('champion.details');

Route::get('/campeones/lista', 'ChampionController@list')->name('champions.list');

Route::get('/campeones/nuevo', 'ChampionController@create')->name('champion.create');

Route::post('/campeones/crear', 'ChampionController@store')->name('champion.create.post');

Route::get('/campeones/{champion}/editar', 'ChampionController@edit')->name('champion.edit');

Route::put('/campeones/{champion}', 'ChampionController@update')->name('champion.update');

Route::delete('/campeones/{champion}', 'ChampionController@destroy')->name('champion.destroy');

/** ************************** ROUTES HABILITIES ************************** */

Route::get('/habilidades', 'HabilityController@index')->name('habilities');

Route::get('/habilidades/lista', 'HabilityController@list')->name('habilities.list');

Route::post('/habilidades/crear', 'HabilityController@store')->name('hability.create.post');

Route::get('/habilidades/nueva', 'HabilityController@create')->name('hability.create');

Route::get('/habilidades/{hability}/editar', 'HabilityController@edit')->name('hability.edit');

Route::put('/habilidades/{hability}', 'HabilityController@update')->name('hability.update');

Route::get('/habilidades/{hability}', 'HabilityController@show')->name('hability.details');

Route::delete('/habilidades/{hability}', 'HabilityController@destroy')->name('hability.destroy');

/** ************************** ROUTES USERS ************************** */

Route::get('/usuarios', 'UserController@index')->name('users');

Route::get('/usuarios/lista', 'UserController@list')->name('users.list');

Route::get('/usuarios/{user}', 'UserController@show')->name('user.details');

Route::delete('/usuarios/{user}', 'UserController@destroy')->name('user.destroy');

/** ************************** ROUTES OBJECTS ************************** */

Route::get('/objetos', 'ObjectController@index')->name('objects');

Route::get('/objetos/{object}', 'ObjectController@show')
    ->where('object', '[0-9]+')->name('object.details');

Route::get('/objetos/lista', 'ObjectController@list')->name('objects.list');

Route::get('/objetos/nuevo', 'ObjectController@create')->name('object.create');

Route::post('/objetos/crear', 'ObjectController@store')->name('object.create.post');

Route::get('/objetos/{object}/editar', 'ObjectController@edit')->name('object.edit');

Route::put('/objetos/{object}', 'ObjectController@update')->name('object.update');

Route::delete('/objetos/{object}', 'ObjectController@destroy')->name('object.destroy');

/** ************************** ROUTES RUNES ************************** */

Route::get('/runas', 'RuneController@index')->name('runes');

Route::get('/runas/{rune}', 'RuneController@show')
    ->where('rune', '[0-9]+')->name('rune.details');

Route::get('/runas/lista', 'RuneController@list')->name('runes.list');

Route::get('/runas/nuevo', 'RuneController@create')->name('rune.create');

Route::post('/runas/crear', 'RuneController@store')->name('rune.create.post');

Route::get('/runas/{rune}/editar', 'RuneController@edit')->name('rune.edit');

Route::put('/runas/{rune}', 'RuneController@update')->name('rune.update');

Route::delete('/runas/{rune}', 'RuneController@destroy')->name('rune.destroy');

/** ************************** ROUTES SPELL ************************** */

Route::get('/hechizo', 'SpellController@index')->name('spells');

Route::get('/hechizo/{spell}', 'SpellController@show')
    ->where('spell', '[0-9]+')->name('spell.details');

Route::get('/hechizo/lista', 'SpellController@list')->name('spells.list');

Route::get('/hechizo/nuevo', 'SpellController@create')->name('spell.create');

Route::post('/hechizo/crear', 'SpellController@store')->name('spell.create.post');

Route::get('/hechizo/{spell}/editar', 'SpellController@edit')->name('spell.edit');

Route::put('/hechizo/{spell}', 'SpellController@update')->name('spell.update');

Route::delete('/hechizo/{spell}', 'SpellController@destroy')->name('spell.destroy');

/** ************************** ROUTES BUILDS ************************** */

Route::get('/build', 'BuildController@index')->name('builds');

Route::get('/build/{build}', 'BuildController@show')
    ->where('build', '[0-9]+')->name('build.details');

Route::get('/hechizo/lista', 'BuildController@list')->name('builds.list');

Route::get('/hechizo/nuevo', 'BuildController@create')->name('build.create');

Route::post('/hechizo/crear', 'BuildController@store')->name('build.create.post');

Route::get('/hechizo/{build}/editar', 'BuildController@edit')->name('build.edit');

Route::put('/hechizo/{build}', 'BuildController@update')->name('build.update');

Route::delete('/hechizo/{build}', 'BuildController@destroy')->name('build.destroy');

