<?php

Auth::routes();

Route::get('/', function () {
    return redirect('/news');
});

Route::get('/news', 'NewsController@index');
Route::get('/news/create', 'NewsController@create')->middleware("auth");
Route::get('/news/{news}', 'NewsController@show');
Route::post('/news/create', 'NewsController@store')->middleware("auth");

Route::post('/comments/{id}', 'CommentsController@store')->middleware("auth");

Route::get('comments/like/{id}', ['as' => 'comments.like', 'uses' => 'LikeController@likeProduct']);
Route::get('news/like/{id}', 'LikesController@likePost');

Route::delete('comments/{id}','CommentsController@dlt')->middleware("auth");
Route::delete('news/{id}','NewsController@dlt')->middleware("auth");
