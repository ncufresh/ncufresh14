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

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

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
//global function
//announcement
Route::resource('announcement', 'AnnouncementController');
Route::resource('links', 'LinksController');

Route::resource('link', 'LinkController');
//==========================================================================================
//error
Route::get('error', array('as' => 'error', 'uses' => 'HomeController@errorPage'));


Route::get('admin', array('as' => 'dashboard', 'uses' => 'HomeController@dashboard'));


//==========================================================================================
//API
Route::group(array('prefix' => 'api/v1'), function()
{
	Route::get('/', function(){return Response::json('Hello API');});
	Route::resource('announcement', 'APIAnnouncementController');
	Route::resource('link', 'APILinkController');
});

//==========================================================================================
//NcuLife
Route::get('nculife', function(){
	return View::make('nculife.nculife_index');
});

Route::get('nculife/food', array('as' => 'nculife.food', 'uses'=>'NcuLifeController@food'));

Route::get('nculife/live', array('as' => 'nculife.live', 'uses'=>'NcuLifeController@live'));

Route::get('nculife/go', array('as' => 'nculife.go', 'uses'=>'NcuLifeController@go'));

Route::get('nculife/inschool', array('as' => 'nculife.inschool', 'uses'=>'NcuLifeController@inschool'));

Route::get('nculife/outschool', array('as' => 'nculife.outschool', 'uses'=>'NcuLifeController@outschool'));

Route::post('nculife/select', array('as' => 'nculife.select', 'uses'=>'NcuLifeController@select'));