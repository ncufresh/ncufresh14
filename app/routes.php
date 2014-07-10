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

Route::resource('link', 'LinkController');

Route::post('imageUpload', array('as' => 'imageUpload', 'uses' => 'HomeController@imageUpload'));

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
//SchoolGuide
Route::get('SchoolGuide', array('as' => 'SchoolGuide', 'uses' => 'SchoolGuideController@show') );

Route::post('Guide', array('as' => 'Guide', 'uses' => 'SchoolGuideController@get') );

//Route::post('Edit', array('as' => 'Edit', 'uses' => 'SchoolGuideController@edit') );

Route::get('SchoolGuide/list',array('as'=>'SchoolGuide.list','uses'=>'SchoolGuideController@showlist'));

//Route::post('sure',array('as'=>'sure','uses'=>'SchoolGuideController@sure'));

Route::get('SchoolGuide/edit/{id}',array('as'=>'SchoolGuide.edit','uses'=>'SchoolGuideController@toedit'));


//============================================================================
//game
Route::get('game', array('as' => 'game', 'uses' => 'GameController@index'));
Route::get('game/snake', array('as' => 'game.snake', 'uses' => 'GameSnakeController@index'));
Route::get('game/campus', array('as' => 'game.campus', 'uses' => 'GamecampusController@index'));
Route::get('game/destiny', array('as' => 'game.destiny', 'uses' => 'GamedestinyController@index'));

Route::post('game/destiny/start', array('as' => 'game.destiny.start', 'uses' => 'GamedestinyController@start'));
Route::post('game/campus/start', array('as' => 'game.campus.start', 'uses' => 'GamecampusController@start'));
//Route::post('game/campus/next', array('as' => 'game.campus.next', 'uses' => 'GamecampusController@next'));

Route::get('game/shop', array('as' => 'game.shop', 'uses' => 'GameController@index'));


//==========================================================================================
//Forum articles
Route::get('articles',array('as' => 'forum' , 'uses' => 'ArticlesController@get_articles'));

Route::post('/new',array('uses' => 'ArticlesController@post_articles'));



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


//==========================================================================================
//video
Route::get('video', array('as' => 'video', 'uses' => 'VideoController@index'));

Route::post('video', array('as' => 'video.message','uses' => 'VideoController@post_index'));
