<?php

Route::get('/',             'HomeController@index');
Route::get('development',  'HomeController@development');
Route::get('about',        'HomeController@about');
Route::post('api/contact', 'Api\ContactController@index');

Route::resource('galleries', 'GalleriesController');

Route::get('posts/{id}/{slug?}', 'PostsController@show');
Route::resource('posts',         'PostsController');

Route::group([
  'prefix'    => 'dashboard',
  'namespace' => 'Dashboard'
], function()
{
  // unauthenticated dashboard routes
  Route::get('login',         'HomeController@login');
  Route::post('authenticate', 'HomeController@authenticate');

  // authenticated dashboard routes
  Route::group([
    'before'    => 'auth',
  ], function()
  {
    Route::get('/',      'HomeController@index');
    Route::get('logout', 'HomeController@logout');

    Route::get('galleries/order',             'GalleriesController@order');
    Route::get('galleries/{id}/images/order', 'Galleries\ImagesController@order');
    Route::resource('galleries',              'GalleriesController', ['except' => ['show']]);
    Route::resource('galleries.images',       'Galleries\ImagesController', ['except' => ['index', 'show']]);
  });
});
