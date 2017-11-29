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

Route::redirect('/', 'file/index');

Route::get('file/upload', 'FileController@form')->name('file.form');
Route::get('file/index', 'FileController@index')->name('file.index');
Route::post('file/upload', 'FileController@upload')->name('file.upload');
Route::get('file/{file}/download', 'FileController@download')->name('file.download');
Route::get('file/{file}/response', 'FileController@response')->name('file.response');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
