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
    return view('welcome');
});

Auth::routes();

Route::resource('notes', 'NoteController')->except('show');
Route::get('notes/archived', 'NoteController@archived')->name('notes.archived');
Route::post('notes/{note}/archive', 'NoteController@archive')->name('notes.archive');
Route::post('notes/{note}/restore', 'NoteController@restore')->name('notes.restore');
