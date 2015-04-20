<?php

Route::get('/', 'HomeController@index');

Route::group([
  'prefix'    => 'dashboard',
  'before'    => 'auth.basic',
  'namespace' => 'Dashboard'
], function()
{
  Route::get('/', 'HomeController@index');
  
  Route::get('galleries/order', 'GalleriesController@order');
  Route::get('galleries/{id}/images/order', 'Galleries\ImagesController@order');
  Route::resource('galleries', 'GalleriesController', ['except' => ['show']]);
  Route::resource('galleries.images', 'Galleries\ImagesController', ['except' => ['index', 'show']]);
});
