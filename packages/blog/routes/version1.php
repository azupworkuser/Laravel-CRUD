<?php
/**
 * 
 * 
 */
$api->resource('posts', 'PostController');
$api->resource('posts.comments','CommentController');
$api->resource('categories','CategoryController');
$api->resource('tags','TagController');


