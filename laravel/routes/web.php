<?php
//auth関連
Auth::routes();

//ゲストユーザーでもOK
Route::get('/','TopController@index')->name('/');
Route::get('/show/{id}','TopController@show')->name('show');

//ログインユーザーのみ
Route::get('/home/{id}', 'HomeController@index')->name('home');
Route::get('/create','HomeController@create')->name('create');
Route::post('/create/store','HomeController@store')->name('store');
Route::get('/edit/{sentence}','HomeController@edit')->name('edit');
Route::patch('/edit/{sentence}/update','HomeController@update')->name('update');
Route::delete('/delete/{sentence}','HomeController@delete')->name('delete');
Route::prefix('sentences')->name('sentences.')->group(function () {
    Route::put('/{sentence}/like', 'HomeController@like')->name('like');
    Route::delete('/{sentence}/like', 'HomeController@unlike')->name('unlike');
});
