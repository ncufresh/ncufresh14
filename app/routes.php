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

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));

//==========================================================================================
//auth
Route::post('login', array('as' => 'login', 'uses' => 'AuthController@login'));
//login with fb
Route::get('login/FB', array('as' => 'loginFB', 'uses' => 'AuthController@loginFB'));
//login with fb callback
Route::get('login/FB/callback', array('as' => 'fb_login_callback', 'uses' => 'AuthController@loginFBCallback'));
//logout
Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@logout'));
//Register
Route::get('register', array('as' => 'register', 'uses' => 'AuthController@register'));
Route::post('register', array('as' => 'register.store', 'uses' => 'AuthController@registerStore'));


//==========================================================================================
//error
Route::get('error', array('as' => 'error', 'uses' => 'HomeController@errorPage'));