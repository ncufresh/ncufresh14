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
Route::get('login/FB', array('as' => 'login.FB', 'uses' => 'AuthController@loginFB'));
//login with fb callback
Route::get('login/FB/callback', array('as' => 'fb_login_callback', 'uses' => 'AuthController@loginFBCallback'));
//logout
Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@logout'));
//Register
Route::get('register', array('as' => 'register', 'uses' => 'AuthController@register'));
Route::get('register/email', array('as' => 'register.email', 'uses' => 'AuthController@register'));
Route::get('register/FB', array('as' => 'register.FB', 'uses' => 'AuthController@register'));
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

Route::get('Guide', array('as' => 'Guide', 'uses' => 'SchoolGuideController@get') );

Route::get('SchoolGuide/getItem', array('as' => 'Guide.one', 'uses' => 'SchoolGuideController@getItem') );

Route::get('SchoolGuide/clickImg', array('as' => 'Guide.map', 'uses' => 'SchoolGuideController@clickImg') );

Route::post('sure', array('as' => 'sure', 'uses' => 'SchoolGuideController@sure') );

Route::post('add', array('as' => 'add', 'uses' => 'SchoolGuideController@add') );

Route::post('delete', array('as' => 'delete', 'uses' => 'SchoolGuideController@delete') );

Route::get('SchoolGuide/list',array('as'=>'SchoolGuide.list','uses'=>'SchoolGuideController@showlist'));

Route::get('SchoolGuide/edit/{id}',array('as'=>'SchoolGuide.edit','uses'=>'SchoolGuideController@toedit'));

Route::get('SchoolGuide/add',array('as'=>'SchoolGuide.add','uses'=>'SchoolGuideController@toadd'));

Route::get('SchoolGuide/{id}',array('as'=>'SchoolGuide.photo','uses'=>'SchoolGuideController@tophoto'));


//============================================================================
//game
Route::get('game', array('as' => 'game', 'uses' => 'GameController@index'));
Route::get('game/snake', array('as' => 'game.snake', 'uses' => 'GameSnakeController@index'));
Route::get('game/campus', array('as' => 'game.campus', 'uses' => 'GamecampusController@index'));
Route::get('game/destiny', array('as' => 'game.destiny', 'uses' => 'GamedestinyController@index'));

Route::post('game/destiny/start', array('as' => 'game.destiny.start', 'uses' => 'GamedestinyController@start'));
Route::post('game/campus/start', array('as' => 'game.campus.start', 'uses' => 'GamecampusController@start'));

Route::get('game/shop', array('as' => 'game.shop', 'uses' => 'GameshopController@index'));
Route::post('game/shop/type', array('as' => 'game.shop.type', 'uses' => 'GameshopController@changeType'));
Route::post('game/shop/buy', array('as' => 'game.shop.buy', 'uses' => 'GameshopController@buy'));


//==========================================================================================
//Forum articles
Route::get('articles',array('as' => 'forum' , 'uses' => 'ArticlesController@getArticles'));

Route::post('/new',array('uses' => 'ArticlesController@postArticles'));

Route::post('/create',array('as' => 'createComment' , 'uses' => 'ArticlesController@postComment' ));

Route::post('/getComments',array('uses' => 'ArticlesController@getComment'));

//==========================================================================================
//NcuLife
Route::get('nculife', function(){
	return View::make('nculife.nculife_index');
});

Route::get('nculife/select', array('as' => 'nculife.select', 'uses'=>'NcuLifeController@select'));

Route::get('nculife/{item}', array('as' => 'nculife.item', 'uses'=>'NcuLifeController@item'))->where('item', '(food|live|go|inschool|outschool)');

//==========================================================================================
//video
Route::get('video', array('as' => 'video', 'uses' => 'VideoController@index'));

Route::post('video', array('as' => 'video.message','uses' => 'VideoController@post_index'));

Route::post('video/message', array('as' => 'video.message','uses' => 'VideoController@post_index'));

Route::post('video/like', array('as' => 'video.rate','uses' =>'VideoController@post_like'));

Route::post('about_rate_url', array('as' => 'video.aboutrate','uses' =>'VideoController@AboutRate'));

//=============================================================================
// Necessity
Route::get('necessity_index',array('as' => 'necessity.necessity_index', 'uses' => 'necessityController@index'));


Route::get('necessity_backstage_freshman',array('as' => 'necessity.necessity_backstage_freshman', 'uses' => 'necessityController@index_backstage_freshman'));

Route::post('freshman_add',array('as' => 'freshman_add', 'uses' => 'necessityController@freshman_add'));

Route::post('freshman_delete',array('as' => 'freshman_delete', 'uses' => 'necessityController@freshman_delete'));


Route::get('necessity_backstage_research',array('as' => 'necessity.necessity_backstage_research', 'uses' => 'necessityController@index_backstage_research'));

Route::post('research_add',array('as' => 'research_add', 'uses' => 'necessityController@research_add'));

Route::post('research_delete',array('as' => 'research_delete', 'uses' => 'necessityController@research_delete'));
//=============================================================================
// About us

Route::get('About_us',array('as'=>'','uses'=>'AboutUsController@index'));

Route::get('About_us/modal',array('as'=>'About_modal','uses'=>'AboutUsController@getModalId'));