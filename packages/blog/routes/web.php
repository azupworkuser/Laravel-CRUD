<?php
Route::group(['middleware' => ['web'], 'as' => 'blog::', 'namespace' => 'Blog\Http\Controllers'], function () {
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
    Route::resource('tags','TagController');
});

