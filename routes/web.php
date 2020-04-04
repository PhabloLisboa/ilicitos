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
Route::get('/sobre', 'Site\SiteController@about')->name('about');

Route::get('/noticias', 'Site\SiteController@news')->name('news');
Route::get('/noticias/{id}', 'Site\SiteController@newsShow')->name('news.site.show');

Route::get('/agenda', 'Site\SiteController@schedule')->name('schedule');
Route::get('/agenda/{id}', 'Site\SiteController@scheduleShow')->name('schedule.site.show');

Route::get('/equipe', 'Site\SiteController@team')->name('team');
Route::get('/equipe/{id}', 'Site\SiteController@showMember')->name('show.member');

Route::get('/galeria', 'Site\SiteController@galleries')->name('galleries');
Route::get('/galeria/{id}', 'Site\SiteController@showPhotos')->name('show.photos');

Route::get('/user/create/{hash}', 'User\UserController@create');
Route::post('/users', 'User\UserController@store')->name('user.store');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/administracao', 'Administracao\AdministracaoController@index')->name('begin');
    Route::resource('/administracao/equipe', 'Team\TeamController');
    Route::resource('/administracao/noticias', 'News\NewsController');
    Route::resource('/administracao/sobre', 'About\AboutController');
    Route::resource('/administracao/agenda', 'Schedule\ScheduleController');
    Route::resource('/administracao/pecas', 'Piece\PieceController');
    Route::resource('/administracao/contato', 'Contact\ContactController');
    Route::resource('/administracao/galeria', 'Gallery\GalleryController');
    Route::post('/administracao/galeria/{id}/add', 'Gallery\GalleryController@add')->name('galeria.add');


    Route::get('/administracao/user/{id}', 'User\UserController@edit')->name('user.edit');;
    Route::put('/administracao/user/{id}', 'User\UserController@update')->name('user.update');

});

