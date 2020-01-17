<?php

/* No authenticated routes */
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));
Route::get('login', array('as' => 'login', 'uses' => 'Auth\LoginController@index'));
Route::post('login', array('as' => 'send_login', 'uses' => 'Auth\LoginController@authenticate'));
Route::get('register', array('as' => 'register', 'uses' => 'Auth\RegisterController@index'));
Route::post('register', array('as' => 'send_register', 'uses' => 'Auth\RegisterController@register'));
Route::get('logout', array('as' => 'logout', 'uses' => 'Auth\LoginController@logout'));
/*Events routes*/
Route::get('events/confirm_presence/{id_event}', array('as' => 'events_confirmation', 'uses' => 'EventsController@confirm'));
/*End event routes*/

/*End no authenticated routes */

/*Authenticated routes*/
Route::group(['middleware' => ['auth']], function () {
    /* Events routes*/
    Route::get('events', array('as' => 'events', 'uses' => 'EventsController@index'));
    Route::get('events/next_days/{days?}', array('as' => 'events_next_days', 'uses' => 'EventsController@nextDays'));
    Route::get('events/today', array('as' => 'events_today', 'uses' => 'EventsController@today'));
    Route::get('events/view/{id_event}', array('as' => 'events_view', 'uses' => 'EventsController@view'));
    Route::post('events/edit/{id_event}', array('as' => 'events_view', 'uses' => 'EventsController@edit'));
    Route::get('events/add', array('as' => 'events_add', 'uses' => 'EventsController@add'));
    Route::post('events/add', array('as' => 'events_create', 'uses' => 'EventsController@create'));
    Route::post('events/import/csv', array('as' => 'events_view', 'uses' => 'EventsController@importCsv'));
    Route::get('events/invite/{id_event}', array('as' => 'invite', 'uses' => 'EventsController@invite'));
    Route::post('events/invite/{id_event}', array('as' => 'send_invite', 'uses' => 'EventsController@sendInvite'));
    /*End event routes*/
});
/*End authenticated routes*/