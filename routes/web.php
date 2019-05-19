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


Route::get('/', function(){
    return view('home');
})->name('home');


Route::get('/admin', function () {
    return view('homeadmin');
})->middleware('administrator');

/** ************************** ROUTES LEGAL ************************** */
Route::get('/advice', function () { return view('advice'); });
Route::get('/about', function () { return view('about'); });
Route::get('/politicy', function () { return view('politicy'); });
Route::get('/contact', function () { return view('contact'); });
Route::get('/terms', function () { return view('terms'); });

/** ************************** ROUTES CHAMPIONS ************************** */

Route::get('/campeones', 'ChampionController@index')->name('champions');

Route::get('/campeonesOrder', 'ChampionController@listAlphabetical')->name('champions.order');

Route::get('/campeones/{champion}', 'ChampionController@show')
    ->where('champion', '[0-9]+')->name('champion.details');

Route::get('/campeones/lista', 'ChampionController@list')->name('champions.list')->middleware('administrator');

Route::get('/campeones/nuevo', 'ChampionController@create')->name('champion.create')->middleware('administrator');

Route::post('/campeones/crear', 'ChampionController@store')->name('champion.create.post')->middleware('administrator');

Route::get('/campeones/{champion}/editar', 'ChampionController@edit')->name('champion.edit')->middleware('administrator');

Route::put('/campeones/{champion}', 'ChampionController@update')->name('champion.update')->middleware('administrator');

Route::delete('/campeones/{champion}', 'ChampionController@destroy')->name('champion.destroy')->middleware('administrator');

/** ************************** ROUTES HABILITIES ************************** */

Route::get('/habilidades', 'HabilityController@index')->name('habilities');

Route::get('/habilidades/lista', 'HabilityController@list')->name('habilities.list')->middleware('administrator');

Route::post('/habilidades/crear', 'HabilityController@store')->name('hability.create.post')->middleware('administrator');

Route::get('/habilidades/nueva', 'HabilityController@create')->name('hability.create')->middleware('administrator');

Route::get('/habilidades/{hability}/editar', 'HabilityController@edit')->name('hability.edit')->middleware('administrator');

Route::put('/habilidades/{hability}', 'HabilityController@update')->name('hability.update')->middleware('administrator');

Route::get('/habilidades/{hability}', 'HabilityController@show')->name('hability.details');

Route::delete('/habilidades/{hability}', 'HabilityController@destroy')->name('hability.destroy')->middleware('administrator');

/** ************************** ROUTES USERS ************************** */

Route::get('/usuarios', 'UserController@index')->name('users')->middleware('administrator');

Route::get('/usuarios/lista', 'UserController@list')->name('users.list')->middleware('administrator');

Route::get('/usuarios/{user}', 'UserController@show')->name('user.details')->middleware('administrator');

Route::delete('/usuarios/{user}', 'UserController@destroy')->name('user.destroy')->middleware('administrator');

/** ************************** ROUTES OBJECTS ************************** */

Route::get('/objetos', 'ObjectController@index')->name('objects');

Route::get('/objetos/{object}', 'ObjectController@show')
    ->where('object', '[0-9]+')->name('object.details');

Route::get('/objetos/lista', 'ObjectController@list')->name('objects.list')->middleware('administrator');

Route::get('/objetos/nuevo', 'ObjectController@create')->name('object.create')->middleware('administrator');

Route::post('/objetos/crear', 'ObjectController@store')->name('object.create.post')->middleware('administrator');

Route::get('/objetos/{object}/editar', 'ObjectController@edit')->name('object.edit')->middleware('administrator');

Route::put('/objetos/{object}', 'ObjectController@update')->name('object.update')->middleware('administrator');

Route::delete('/objetos/{object}', 'ObjectController@destroy')->name('object.destroy')->middleware('administrator');

/** ************************** ROUTES RUNES ************************** */

Route::get('/runas', 'RuneController@index')->name('runes');

Route::get('/runas/{rune}', 'RuneController@show')
    ->where('rune', '[0-9]+')->name('rune.details');

Route::get('/runas/lista', 'RuneController@list')->name('runes.list')->middleware('administrator');

Route::get('/runas/nuevo', 'RuneController@create')->name('rune.create')->middleware('administrator');

Route::post('/runas/crear', 'RuneController@store')->name('rune.create.post')->middleware('administrator');

Route::get('/runas/{rune}/editar', 'RuneController@edit')->name('rune.edit')->middleware('administrator');

Route::put('/runas/{rune}', 'RuneController@update')->name('rune.update')->middleware('administrator');

Route::delete('/runas/{rune}', 'RuneController@destroy')->name('rune.destroy')->middleware('administrator');

/** ************************** ROUTES SPELL ************************** */

Route::get('/hechizos', 'SpellController@index')->name('spells');

Route::get('/hechizos/{spell}', 'SpellController@show')
    ->where('spell', '[0-9]+')->name('spell.details');

Route::get('/hechizos/lista', 'SpellController@list')->name('spells.list')->middleware('administrator');

Route::get('/hechizos/nuevo', 'SpellController@create')->name('spell.create')->middleware('administrator');

Route::post('/hechizos/crear', 'SpellController@store')->name('spell.create.post')->middleware('administrator');

Route::get('/hechizos/{spell}/editar', 'SpellController@edit')->name('spell.edit')->middleware('administrator');

Route::put('/hechizos/{spell}', 'SpellController@update')->name('spell.update')->middleware('administrator');

Route::delete('/hechizos/{spell}', 'SpellController@destroy')->name('spell.destroy')->middleware('administrator');

/** ************************** ROUTES BUILDS ************************** */

Route::get('/builds', 'BuildController@index')->name('builds')->middleware('auth');

Route::get('/builds/{build}', 'BuildController@show')
    ->where('build', '[0-9]+')->name('build.details')->middleware('auth');

Route::get('/builds/lista', 'BuildController@list')->name('builds.list')->middleware('administrator');

Route::get('/builds/nuevo', 'BuildController@create')->name('build.create')->middleware('auth');

Route::post('/builds/crear', 'BuildController@store')->name('build.create.post')->middleware('auth');

Route::get('/builds/{build}/editar', 'BuildController@edit')->name('build.edit')->middleware('auth');

Route::put('/builds/{build}', 'BuildController@update')->name('build.update')->middleware('auth');

Route::delete('/builds/{build}', 'BuildController@destroy')->name('build.destroy')->middleware('auth');

/** ************************** ROUTES PAGRUNES ************************** */

Route::get('/pagrunas', 'PageRunesController@index')->name('pagrunes');

Route::get('/pagrunas/{pagrune}', 'PageRunesController@show')
    ->where('pagrune', '[0-9]+')->name('pagrunes.details');

Route::get('/pagrunas/lista', 'PageRunesController@list')->name('pagrunes.list')->middleware('administrator');

Route::get('/pagrunas/nuevo', 'PageRunesController@create')->name('pagrune.create')->middleware('auth');

Route::post('/pagrunas/crear', 'PageRunesController@store')->name('pagrune.create.post')->middleware('auth');

Route::get('/pagrunas/{pagrune}/editar', 'PageRunesController@edit')->name('pagrune.edit')->middleware('auth');

Route::put('/pagrunas/{pagrune}', 'PageRunesController@update')->name('pagrune.update')->middleware('auth');

Route::delete('/pagrunas/{pagrune}', 'PageRunesController@destroy')->name('pagrune.destroy')->middleware('auth');

Route::get('/pagrunas/filter', 'PageRunesController@showTypes')->name('pagrune.filter')->middleware('auth');

Route::get('/pagrunas/filterEdit', 'PageRunesController@showTypesEdit')->name('pagrune.filteredit')->middleware('auth');


Auth::routes();
