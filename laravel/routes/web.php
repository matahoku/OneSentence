<?php
Auth::routes();
//ゲストユーザーでもOK
Route::get('/','TopController@index')->name('/');

//ログインユーザーのみ
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create','HomeController@create')->name('create');
Route::post('/create/store','HomeController@store')->name('store');
