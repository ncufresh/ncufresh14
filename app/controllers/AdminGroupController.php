<?php

class AdminGroupController extends AdminBaseController{

	public function index(){
		App::make('SiteMap')->pushLocation('群組', route('group'));

		$roles = Role::all();
		$permissions = Permission::all();
		return View::make('admin.group', array('roles' => $roles, 'permissions' => $permissions));
	}

	public function permissionList(){

	}

}