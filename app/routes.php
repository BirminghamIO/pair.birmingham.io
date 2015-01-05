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
Route::get('logout/', array('before' => 'auth', 'uses' => 'AuthController@logout'));

//Account
Route::get('account', array('before' => 'auth', 'uses' => 'UserController@getEdit'));
Route::post('account', array('before' => 'auth', 'uses' => 'UserController@postEdit'));
Route::get('account/password', array('before' => 'auth', 'uses' => 'UserController@getChangePassword'));
Route::post('account/password', array('before' => 'auth', 'uses' => 'UserController@postChangePassword'));

//Oauth
Route::get('github/connect', array('uses' => 'OauthController@githubConnect'));
Route::get('github/disconnect', array('before' => 'auth', 'uses' => 'OauthController@githubDisconnect'));

//Others
Route::get('{nick}', array('before' => 'auth', 'uses' => 'UserController@showProfile'));