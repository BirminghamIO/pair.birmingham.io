<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Basic
Route::get('/', array('uses' => 'HomeController@showWelcome'));

//Auth
Route::get('login', array('before' => 'guest', 'uses' => 'AuthController@index'));
Route::post('login', array('before' => 'guest', 'uses' => 'AuthController@login'));
Route::get('login/github', array('before' => 'guest', 'uses' => 'AuthController@loginWithGithub'));
Route::get('logout/', array('before' => 'auth', 'uses' => 'AuthController@logout'));

//Account
Route::get('account', array('before' => 'auth', 'uses' => 'UserController@getEdit'));
Route::post('account', array('before' => 'auth', 'uses' => 'UserController@postEdit'));
Route::get('account/password', array('before' => 'auth', 'uses' => 'UserController@getChangePassword'));
Route::post('account/password', array('before' => 'auth', 'uses' => 'UserController@postChangePassword'));

//Other
Route::get('{nick}', array('before' => 'auth', 'uses' => 'UserController@showProfile'));