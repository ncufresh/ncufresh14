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


//============================================================================
//game
Route::get('game', array('as' => 'game', 'uses' => 'GameController@index'));
Route::get('game/snake', array('as' => 'game.snake', 'uses' => 'GameSnakeController@index'));
Route::get('game/campus', array('as' => 'game.campus', 'uses' => 'GamecampusController@index'));
Route::get('game/destiny', array('as' => 'game.destiny', 'uses' => 'GamedestinyController@index'));

Route::get('game/shop', array('as' => 'game.shop', 'uses' => 'GameController@index'));

//==========================================================================================
//Forum articles
Route::get('articles',function(){
	return View::make('articles');
});
