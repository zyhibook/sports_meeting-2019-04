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

Route::get('/', 'PagesController@root')->name('pages.root');

Route::resource('news', 'NewsController');
Route::resource('games', 'GamesController', ['except' => ['show']]);
Route::resource('teams', 'TeamsController', ['except' => ['show']]);