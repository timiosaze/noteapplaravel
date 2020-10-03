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

// Route::get('/', function () {
//     return view('note.index');
// });
Route::get('/', 'HomeController@index')->name('home');

Route::get('/notes', 'NoteController@index')->name('note.index');
Route::post('/notes', 'NoteController@store')->name('note.store');
Route::get('/notes/{id}/edit', 'NoteController@edit')->name('note.edit');
Route::put('/notes/{id}', 'NoteController@update')->name('note.update');
Route::delete('/notes/{id}', 'NoteController@destroy')->name('note.destroy');
Auth::routes();


Auth::routes();

