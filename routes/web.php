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

Route::get('/campeonesOrder', 'ChampionController@listAlphabetical')->name('champions.order');

Route::get('/campeones/{champion}', 'ChampionController@show')
    ->where('champion', '[0-9]+')->name('champion.details');

Route::get('/campeones/lista', 'ChampionController@list')->name('champions.list');

Route::get('/campeones/nuevo', 'ChampionController@create')->name('champion.create');

Route::post('/campeones/crear', 'ChampionController@store')->name('champion.create.post');

Route::get('/campeones/{champion}/editar', 'ChampionController@edit')->name('champion.edit');

Route::put('/campeones/{champion}', 'ChampionController@update')->name('champion.update');

Route::delete('/campeones/{champion}', 'ChampionController@destroy')->name('champion.destroy');
/*








*/
Route::get('/habilidades', 'HabilityController@index')->name('habilities');

Route::get('/habilidades/lista', 'HabilityController@list')->name('habilities.list');

Route::get('/habilidades/crear', 'HabilityController@store')->name('hability.create.post');

Route::get('/habilidades/nueva', 'HabilityController@create')->name('hability.create');

Route::get('/habilidades/{hability}/editar', 'HabilityController@edit')->name('hability.edit');

Route::get('/habilidades/{hability}', 'HabilityController@show')->name('hability.details');

Route::get('/habilidades/{hability}', 'HabilityController@destroy')->name('hability.destroy');





Route::get('/objetos', 'ObjectController@index')->name('objects');

Route::get('/objetos/{object}', 'ObjectController@show')
    ->where('object', '[0-9]+')->name('object.details');

    //aqui
Route::get('/usuarios/lista', 'UserController@list')->name('users.list');
//

Route::get('/objetos/lista', 'ObjectController@list')->name('objects.list');

Route::get('/objetos/nuevo', 'ObjectController@create')->name('object.create');

Route::post('/objetos/crear', 'ObjectController@store')->name('object.create.post');

Route::get('/objetos/{object}/editar', 'ObjectController@edit')->name('object.edit');

Route::put('/objetos/{object}', 'ObjectController@update')->name('object.update');

Route::delete('/objetos/{object}', 'ObjectController@destroy')->name('object.destroy');

Route::get('/runas', 'RuneController@index')->name('runes');

Route::get('/runas/{rune}', 'RuneController@show')
    ->where('rune', '[0-9]+')->name('rune.details');

Route::get('/runas/lista', 'RuneController@list')->name('runes.list');

Route::get('/runas/nuevo', 'RuneController@create')->name('rune.create');

Route::post('/runas/crear', 'RuneController@store')->name('rune.create.post');

Route::get('/runas/{rune}/editar', 'RuneController@edit')->name('rune.edit');

Route::put('/runas/{rune}', 'RuneController@update')->name('rune.update');

Route::delete('/runas/{rune}', 'RuneController@destroy')->name('rune.destroy');

