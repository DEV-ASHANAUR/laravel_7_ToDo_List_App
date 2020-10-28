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
    // Route::get('login/fb', 'Auth\LoginController@fb');
    // Route::get('login/fb/callback', 'Auth\LoginController@fbRedirect');

Route::get('login/github', 'Auth\LoginController@github');
Route::get('login/github/callback', 'Auth\LoginController@githubRedirect');


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

// SSLCOMMERZ Start
Route::get('/example1', 'SslCommerzPaymentController@exampleEasyCheckout');
Route::get('/example2', 'SslCommerzPaymentController@exampleHostedCheckout');

Route::post('/pay', 'SslCommerzPaymentController@index');
Route::post('/pay-via-ajax', 'SslCommerzPaymentController@payViaAjax');

Route::post('/success', 'SslCommerzPaymentController@success');
Route::post('/fail', 'SslCommerzPaymentController@fail');
Route::post('/cancel', 'SslCommerzPaymentController@cancel');

Route::post('/ipn', 'SslCommerzPaymentController@ipn');
//SSLCOMMERZ END
