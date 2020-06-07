<?php
//ユーザー情報関連
Auth::routes();
Route::prefix('user')->name('user.')->group(function(){
  Route::delete('/delete/{user}','UserController@delete')->name('delete');
  Route::get('/edit/{user}','UserController@edit')->name('edit');
  Route::patch('/edit/{user}/update','UserController@update')->name('update');
});

//お問い合わせフォーム メール送信
Route::post('/contact', 'ContactController@contact')->name('contact');

//ゲストユーザーでもOK
Route::get('/', 'TopController@index')->name('/');
Route::get('/description', 'TopController@description')->name('description');
Route::post('/search', 'TopController@search')->name('search');
Route::get('/tag/{name}', 'TopController@tagShow')->name('tag');
Route::prefix('users')->name('users.')->group(function() {
    Route::get('/{id}', 'TopController@show')->name('show');
    Route::get('/{id}/likes', 'TopController@likes')->name('likes');
    Route::get('/{id}/followings', 'TopController@followings')->name('followings');
    Route::get('/{id}/followers', 'TopController@followers')->name('followers');
});

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
Route::prefix('users')->name('users.')->group(function() {
    Route::put('/{name}/follow', 'HomeController@follow')->name('follow');
    Route::delete('/{name}/follow', 'HomeController@unfollow')->name('unfollow');
});
