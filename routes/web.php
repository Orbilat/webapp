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

Route::get('/', 'AdminsController@index')->name('landing');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/', 'AdminsController@addClient')->name('addClient');

Route::post('/home/edit', 'AdminsController@updateClient')->name('updateClient');

Route::get('/home/delete/{id}', ['as' => 'delete', 'uses' => 'AdminsController@delete']);

Route::get('/home/edit/{id}', ['as' => 'edit', 'uses' => 'AdminsController@edit']);

Auth::routes();

