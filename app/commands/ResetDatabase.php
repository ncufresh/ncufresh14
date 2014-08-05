<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ResetDatabase extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'resetDatabase';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Reset the datebase';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		if ($this->confirm('Do you really want to do it? [yes|no]', false))
		{
			//game
			GameBuy::truncate();
			Game::truncate();
			GameSnake::truncate();
			$users = User::all();
			foreach($users as $user){
				$gameUser = new Game;
				$gameUser->user_id = $user->id;
				$gameUser->power = 5;
				$gameUser->max_power = 5;
				$gameUser->gp = 0;
				$gameUser->head = 1;
				$gameUser->face = 7;
				$gameUser->body = 13;
				$gameUser->foot = 19;
				$gameUser->item = 0;
				$gameUser->map = 0;
				$gameUser->save();

				$buy = new GameBuy;
				$buy->user_id = $gameUser->id;
				$buy->item_id = 1;
				$buy->save();
				$buy = new GameBuy;
				$buy->user_id = $gameUser->id;
				$buy->item_id = 7;
				$buy->save();
				$buy = new GameBuy;
				$buy->user_id = $gameUser->id;
				$buy->item_id = 13;
				$buy->save();
				$buy = new GameBuy;
				$buy->user_id = $gameUser->id;
				$buy->item_id = 19;
				$buy->save();
			}

			//video
			VideoMessage::truncate();
			VideoLike::truncate();

			//user pic
			$directory = File::files(public_path() . '/img/person/');
			foreach($directory as $file){
				if($file != '0.png'){
					File::delete($file);
				}
			}
//			$file = File::get(public_path() . '/images/person/0.png');
			File::copy(public_path() . '/images/person/0.png', public_path() . '/img/person/0.png');
		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			//array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
//			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
