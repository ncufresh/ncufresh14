<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoleToTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$developer = new Role;
		$developer->name = 'Developer';
		$developer->save();

		$admin = new Role;
		$admin->name = '系統管理者';
		$admin->save();

		$editor = new Role;
		$editor->name = '編輯者';
		if($editor->forceSave()){
			echo '1';
		}else{
			echo '2';
		}


		$unit = new Role;
		$unit->name = '社團/系所帳號';
		$unit->save();

		$user = new Role;
		$user->name = '一般帳號';
		$user->save();



		$manageUsers = new Permission;
		$manageUsers->name = 'manage_users';
		$manageUsers->display_name = '管理會員';
		$manageUsers->save();

		$manageAnnouncement = new Permission;
		$manageAnnouncement->name = 'manage_announcement';
		$manageAnnouncement->display_name = '管理公告';
		$manageAnnouncement->save();

		$manageLink = new Permission;
		$manageLink->name = 'manage_link';
		$manageLink->display_name = '管理常用連結';
		$manageLink->save();

		$manageCalender = new Permission;
		$manageCalender->name = 'manage_calender';
		$manageCalender->display_name = '管理行事曆';
		$manageCalender->save();

		$manageEditor = new Permission;
		$manageEditor->name = 'manage_editor';
		$manageEditor->display_name = '編輯文案';
		$manageEditor->save();

		$globalUsage = new Permission;
		$globalUsage->name = 'global_usage';
		$globalUsage->display_name = '一般使用';
		$globalUsage->save();

		$forumUsage = new Permission;
		$forumUsage->name = 'forum_usage';
		$forumUsage->display_name = '論壇一般發文';
		$forumUsage->save();

		$forumUnit = new Permission;
		$forumUnit->name = 'forum_unit';
		$forumUnit->display_name = '社團/系所編輯';
		$forumUnit->save();



		$developer->perms()->sync(array(
			$manageUsers->id,
			$manageAnnouncement->id,
			$manageLink->id,
			$manageCalender->id,
			$manageEditor->id,
			$globalUsage->id,
			$forumUsage->id,
			$forumUnit->id,
		));

		$admin->perms()->sync(array(
			$manageUsers->id,
			$manageAnnouncement->id,
			$manageLink->id,
			$manageCalender->id,
			$manageEditor->id,
			$globalUsage->id,
			$forumUsage->id,
			$forumUnit->id,
		));

		$editor->perms()->sync(array(
			$manageAnnouncement->id,
			$manageLink->id,
			$manageCalender->id,
			$manageEditor->id,
			$globalUsage->id,
			$forumUsage->id,
			$forumUnit->id,
		));

		$unit->perms()->sync(array(
			$globalUsage->id,
			$forumUnit->id,
		));

		$user->perms()->sync(array(
			$globalUsage->id,
		));


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
//		Role::truncate();
	}

}
