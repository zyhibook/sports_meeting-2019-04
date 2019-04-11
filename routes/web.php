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
Route::get('admin', 'PagesController@admin')->name('pages.admin');
Route::get('login', 'LoginController@create')->name('login.create');
Route::post('login', 'LoginController@login')->name('login');
Route::post('logout', 'LoginController@logout')->name('logout');


Route::resource('news', 'NewsController');
Route::resource('games', 'GamesController', ['except' => ['show', 'create', 'edit']]);
Route::resource('teams', 'TeamsController', ['except' => ['show']]);
