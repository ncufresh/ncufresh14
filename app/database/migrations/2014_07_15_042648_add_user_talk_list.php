<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserTalkList extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		UserTalk::truncate();

		UserTalk::create(array('string' => '想看看不一樣的我嗎?'));
		UserTalk::create(array('string' => '其實我跟麵包超人一樣可以換頭喔!'));
		UserTalk::create(array('string' => '怎麼辦我右手的螺絲好像有點鬆了!'));
		UserTalk::create(array('string' => '阿沒有武器是要怎樣上戰場啦'));
		UserTalk::create(array('string' => '每天都同一個表情覺得快中風了'));
		UserTalk::create(array('string' => '要幫我選個夏天的顏色嗎?'));
		UserTalk::create(array('string' => '人家也想要像洛克人一樣有加農砲啦'));
		UserTalk::create(array('string' => '最近膝蓋不太好要吃微骨立了,可以幫我挑一雙像志玲姐接的美腿嗎?'));
		UserTalk::create(array('string' => '你會不會覺得我今天的臉很衰,想make me happy嗎?'));
		UserTalk::create(array('string' => '拜託買件新衣給人家嘛'));

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		UserTalk::truncate();
	}

}
