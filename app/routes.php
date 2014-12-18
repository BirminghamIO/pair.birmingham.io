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
Route::get('login/github', array('before' => 'guest', 'uses' => 'AuthController@loginWithGithub'));
Route::get('logout/', array('before' => 'auth', 'uses' => 'AuthController@logout'));