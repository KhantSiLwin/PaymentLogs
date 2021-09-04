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

Route::get('/','PaymentlogController@index');

Route::resource('paymentlog','PaymentlogController');
Route::get('/daily/{id?}', 'PaymentlogController@daily')->name('paymentlog.daily');
Route::get('/monthly/{id?}', 'PaymentlogController@monthly')->name('paymentlog.monthly');
Route::get('/yearly', 'PaymentlogController@yearly')->name('paymentlog.yearly');
Route::get('/dailylog/{id}', 'PaymentlogController@dailylog')->name('paymentlog.dailylog');
Route::get('/monthlylog/{id}', 'PaymentlogController@monthlylog')->name('paymentlog.monthlylog');
Route::get('/yearlylog/{id}', 'PaymentlogController@yearlylog')->name('paymentlog.yearlylog');

Auth::routes();

Route::get('/home', 'PaymentlogController@index')->name('home');
Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
Route::post('/profile','ProfileController@update')->name('profile.update');