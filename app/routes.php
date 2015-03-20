<?php

Route::get('/', 'HomeController@index');

Route::get('/dashboard', ['before' => 'auth.basic', 'uses' => 'Dashboard\HomeController@index']);
