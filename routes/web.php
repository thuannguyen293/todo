<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/todos', 'TodoController@index')->name('todos.index');
Route::get('/todos/create', 'TodoController@create')->name('todos.create');
Route::post('/todos/create', 'TodoController@store')->name('todos.store');
Route::get('/todos/edit/{id}', 'TodoController@edit')->name('todos.edit');
Route::put('/todos/update/{id}', 'TodoController@update')->name('todos.update');