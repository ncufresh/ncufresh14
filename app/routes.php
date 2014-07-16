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
Route::post('login/ajax', array('as' => 'login.ajax', 'uses' => 'AuthController@loginAjax'));
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
Route::get('register/highschool', array('as' => 'register.high', 'uses' => 'AuthController@highSchool'));

//==========================================================================================
//user
Route::get('user', array('as' => 'user.self', 'uses' => 'UserController@selfIndex'));
Route::get('user/{id}', array('as' => 'user.id', 'uses' => 'UserController@index'));

//==========================================================================================
//global function
//announcement
Route::resource('announcement', 'AnnouncementController', array('only' => array('index', 'show')));

Route::resource('link', 'LinkController');

//Route::resource('calender', 'CalenderController');

Route::post('imageUpload', array('as' => 'imageUpload', 'uses' => 'HomeController@imageUpload'));

//==========================================================================================
//error
Route::get('error', array('as' => 'error', 'uses' => 'HomeController@errorPage'));


//Route::get('admin', array('as' => 'dashboard', 'uses' => 'HomeController@dashboard'));


//==========================================================================================
//admin
Route::group(array('prefix' => 'admin'), function(){
	Route::get('/', array('as' => 'dashboard', 'uses' => 'AdminController@index'));
	Route::resource('announcement', 'AdminAnnouncementController');

	Route::resource('link', 'AdminLinkController');

	Route::get('group', array('as' => 'admin.group', 'uses' => 'AdminGroupController@index'));

	Route::get('users', array('as' => 'admin.users', 'uses' => 'AdminUsersController@index'));
	Route::post('users/changeRole', array('as' => 'admin.changeRole', 'uses' => 'AdminUsersController@changeRole'));


	Route::resource('calender', 'AdminCalenderController');


	Route::group(array('prefix' => 'api'), function(){
		Route::resource('link', 'APILinkController');
	});

	Route::get('eriauhfgowijfdwoiEJF', 'AuthController@makePermissionAndRole');
//	Route::resource('users', array('as' => 'users', 'uses' => ''));
});

//==========================================================================================
//API
Route::group(array('prefix' => 'api'), function()
{
	Route::get('/', function(){return Response::json('Hello API');});
	Route::resource('announcement', 'APIAnnouncementController');

	Route::resource('calender', 'APICalenderController');
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
Route::get('game/power', array('as' => 'game.power', 'uses' => 'GamePowerController@index'));
Route::post('game/power/getDayQuest', array('as' => 'game.power.getDayQuest', 'uses' => 'GamePowerController@getDayQuest'));

Route::post('game/destiny/start', array('as' => 'game.destiny.start', 'uses' => 'GamedestinyController@start'));
Route::post('game/campus/start', array('as' => 'game.campus.start', 'uses' => 'GamecampusController@start'));

Route::get('game/shop', array('as' => 'game.shop', 'uses' => 'GameshopController@index'));
Route::post('game/shop/type', array('as' => 'game.shop.type', 'uses' => 'GameshopController@changeType'));
Route::post('game/shop/buy', array('as' => 'game.shop.buy', 'uses' => 'GameshopController@buy'));
Route::post('game/shop/equip', array('as' => 'game.shop.equip', 'uses' => 'GameshopController@equip'));


//==========================================================================================
//Forum articles
Route::get('articles',array('as' => 'forum' , 'uses' => 'ArticlesController@getArticles'));

Route::post('/new',array('uses' => 'ArticlesController@postArticles'));

Route::post('/create',array('as' => 'createComment' , 'uses' => 'ArticlesController@postComment' ));

Route::post('/getComments',array('uses' => 'ArticlesController@getComment'));

Route::post('/orderNew',array('uses' =>'ArticlesController@newArticles'));

Route::post('/orderPop',array('uses' => 'ArticlesController@popArticles'));

//==========================================================================================
//NcuLife
Route::get('nculife', array('as' => 'nculife.index', 'uses' => 'NcuLifeController@index'));

Route::get('nculife/select', array('as' => 'nculife.select', 'uses' => 'NcuLifeController@select'));

Route::get('nculife/{item}', array('as' => 'nculife.item', 'uses' => 'NcuLifeController@item'))->where('item', '(food|live|go|inschool|outschool)');

Route::get('nculife/data', array('as' => 'nculife.data', 'uses' => 'NcuLifeController@data'));

Route::get('nculife/data/add', array('as' => 'nculife.add', 'uses' => 'NcuLifeController@add'));

Route::get('nculife/data/edit/{id}', array('as' => 'nculife.edit', 'uses' => 'NcuLifeController@edit'));

Route::post('nculife/addData', array('as' => 'nculife.addData', 'uses' => 'NcuLifeController@addData'));

Route::post('nculife/editData', array('as' => 'nculife.editData', 'uses' => 'NcuLifeController@editData'));

Route::post('nculife/deleteData', array('as' => 'nculife.deleteData', 'uses' => 'NcuLifeController@deleteData'));

Route::post('nculife/deletePicture', array('as' => 'nculife.deletePicture', 'uses' => 'NcuLifeController@deletePicture'));

//==========================================================================================
//video
Route::get('video', array('as' => 'video', 'uses' => 'VideoController@index'));

Route::post('video', array('as' => 'video.message','uses' => 'VideoController@post_index'));

Route::post('video/message', array('as' => 'video.message','uses' => 'VideoController@post_index'));

Route::post('video/like', array('as' => 'video.rate','uses' =>'VideoController@post_like'));

Route::post('about_rate_url', array('as' => 'video.aboutrate','uses' =>'VideoController@AboutRate'));

Route::get('video/intro', array('as' => 'video.intro','uses' => 'VideoController@change_introduction'));

//=============================================================================
// Necessity
Route::get('necessity',array('as' => 'necessity.necessity_index', 'uses' => 'necessityController@index'));


Route::get('necessity/backstage/freshman',array('as' => 'necessity.necessity_backstage_freshman', 'uses' => 'necessityController@index_backstage_freshman'));

Route::post('freshman_add',array('as' => 'freshman_add', 'uses' => 'necessityController@freshman_add'));

Route::post('freshman_delete',array('as' => 'freshman_delete', 'uses' => 'necessityController@freshman_delete'));

Route::post('freshman_edit',array('as' => 'freshman_edit', 'uses' => 'necessityController@freshman_edit'));


Route::get('necessity/backstage/research',array('as' => 'necessity.necessity_backstage_research', 'uses' => 'necessityController@index_backstage_research'));

Route::post('research_add',array('as' => 'research_add', 'uses' => 'necessityController@research_add'));

Route::post('research_delete',array('as' => 'research_delete', 'uses' => 'necessityController@research_delete'));

Route::post('research_edit',array('as' => 'research_edit', 'uses' => 'necessityController@research_edit'));


Route::get('necessity/backstage/research/{id}',array('as' => 'necessity.necessity_backstage_research_edit', 'uses' => 'necessityController@edit'));

Route::get('necessity/backstage/freshman/{id}',array('as' => 'necessity.necessity_backstage_freshman_edit', 'uses' => 'necessityController@editA'));

//=============================================================================
// About us

Route::get('About_us',array('as'=>'','uses'=>'AboutUsController@index'));


Route::get('About_us/modal',array('as'=>'About.modal','uses'=>'AboutUsController@getModalId'));
