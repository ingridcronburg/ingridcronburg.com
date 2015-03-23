<?php

Route::get('/', 'HomeController@index');

Route::group([
  'prefix'    => 'dashboard',
  'before'    => 'auth.basic',
  'namespace' => 'Dashboard'
], function()
{
  Route::get('/', 'HomeController@index');

  Route::resource('galleries', 'GalleriesController', ['except' => ['show']]);
});
