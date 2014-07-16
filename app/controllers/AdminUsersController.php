<?php

class AdminUsersController extends AdminBaseController{

	public function index(){
		App::make('SiteMap')->pushLocation('管理會員群組', route('admin.users'));
		$users = User::all();
		$rolesData = Role::all();
		$data = array();
		for($i=0; $i<count($rolesData); $i++){
			$data[$rolesData[$i]->id] = $rolesData[$i]->name;
		}
		return View::make('admin.user', array('users' => $users, 'roles' => $data));
	}

	public function changeRole(){
		$id = Input::get('id');
		$user = User::find($id);
		$roleId = Input::get('role_id');
		$role = Role::find($roleId);
		$user->roles()->sync(array($role->id));
		return Redirect::route('admin.users');
	}
}