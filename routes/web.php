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
Auth::routes();

Route::get('/', 'Home\HomeController@index')->name('begin');
Route::get('/administracao/equipe/user/create/{hash}', 'User\UserController@store');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/administracao', 'Administracao\AdministracaoController@index')->name('begin');

    Route::resource('/administracao/equipe', 'Team\TeamController');

});

