<?php

/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
*/

ClassLoader::addDirectories(array(

	app_path().'/commands',
	app_path().'/controllers',
	app_path().'/models',
	app_path().'/database/seeds',

));

/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
| Here we will configure the error logger setup for the application which
| is built on top of the wonderful Monolog library. By default we will
| build a basic log file setup which creates a single file for logs.
|
*/

$logFile = 'laravel.log';

Log::useDailyFiles(storage_path().'/logs/'.$logFile);

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{
	Log::error($exception);
	App::make('SiteMap')->pushLocation('錯誤頁面', route('error'));

	if(Request::server('SERVER_NAME') == 'ncufresh.ncu.edu.tw' || Request::server('SERVER_NAME') == 'ncufresh14.weigreen.com'){
		Mail::queue('emails.error', array('now' => \Carbon\Carbon::now()->toDateTimeString(), 'exception' => $exception->getMessage()), function($message){
			$message->from('system@ncufresh.ncu.edu.tw', '系統自動發信')->subject('大一生活知訊網-爆炸拉');;

			$message->to('andy199310@gmail.com');
			$message->to('inin610719@hotmail.com');
	//		$message->to('abc50604@yahoo.com.tw');
	//		$message->to('andy199310@gmail.com');  //++

		});
	}

	if(Config::get('app.debug') == false){
		return Response::view('errors.index', array('message' => '有事情發生了'), 404);
	}
	return Response::view('errors.index', array('message' => '有事情發生了'.$exception->getMessage()), 404);
});

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenance mode is in effect for the application.
|
*/

App::down(function()
{
	if (App::environment('local') || Request::server('SERVER_NAME') == 'ncufresh14.weigreen.com' || Request::get('testing') == 'naenfadwoeidweof' || Session::get('testing-session') == true) {
		//local mode
		Session::set('testing-session', true);
		return NULL;
	}
	return Response::view("comingsoon.index", array(), 200);
});

/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
| Next we will load the filters file for the application. This gives us
| a nice separate location to store our route and application filter
| definitions instead of putting them all in the main routes file.
|
*/

App::instance('TransferData', new TransferData);
App::instance('SiteMap', new SiteMap);


App::missing(function($exception)
{
	Log::error($exception);
	App::make('SiteMap')->pushLocation('首頁', route('home'));
	App::make('SiteMap')->pushLocation('錯誤頁面', route('error'));
	return Response::view('errors.index', array('message' => '找不到路徑'), 404);
});

App::before(function($request)
{
	if(BrowserDetect::isIEVersion(7, true)){
		return View::make('ie.index');

	}
});


require app_path().'/filters.php';
