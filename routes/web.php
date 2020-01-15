<?php

/* No authenticated routes */
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));
Route::get('login', array('as' => 'login', 'uses' => 'Auth\LoginController@index'));
Route::post('login', array('as' => 'logar', 'uses' => 'Auth\LoginController@login'));
Route::get('register', array('as' => 'register', 'uses' => 'Auth\RegisterController@index'));
Route::post('register', array('as' => 'send_register', 'uses' => 'Auth\RegisterController@create'));
Route::get('logout', array('as' => 'logout', 'uses' => 'Auth\LoginController@logout'));

//Authenticated routes
Route::group(['middleware' => ['autenticado']], function () {
    Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'DashboardController@index'));
});