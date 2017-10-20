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


Route::get('/', function () {
    return view('welcome');
});
Route::get('skills', function() {
	return ['Laravel', 'Php', 'Vue', 'Jquery', 'JavaScript'];
});
*/

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::get('dvista', 'DependenController@depvista');
Route::resource('/depen', 'DependenController');

Route::get('elemvista', 'ElementController@vistaelement');
Route::resource('/elemen', 'ElementController');

Route::get('vistaequi', 'InvendetaController@vistaequipo');
Route::resource('equipos', 'InvendetaController');

Route::get('lisinven', 'InventalistadoController@vistalistainven');
Route::resource('/invens', 'InventalistadoController');

