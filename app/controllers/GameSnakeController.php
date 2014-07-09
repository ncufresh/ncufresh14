<?php

class GameSnakeController extends BaseController 
{

	public function index()
	{
		return View::make('game.snake');
	}


}