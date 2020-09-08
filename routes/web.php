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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/index','TodoController@index')->name('todo.index');
    Route::get('/create','TodoController@create')->name('todo.create');
    Route::post('/store','TodoController@store')->name('todo.store');
    Route::get('/show/{todo}','TodoController@show')->name('todo.show');
    Route::get('/edit/{todo}','TodoController@edit')->name('todo.edit');
    Route::post('/update/{todo}','TodoController@update')->name('todo.update');
    Route::get('/destroy/{todo}','TodoController@destroy')->name('todo.destroy');
    Route::get('/com/{id}','TodoController@complete')->name('todo.com');
    Route::get('/uncom/{id}','TodoController@uncomplete')->name('todo.uncom');
});
