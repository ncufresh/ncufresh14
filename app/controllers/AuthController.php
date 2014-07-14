<?php


class AuthController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Auth Controller
	|--------------------------------------------------------------------------
	|
	| Auth controller provide all the method of login/logout
	|
	*/

	/*
	 * Default login
	 * with: email, password
	 */
	public function login(){
		if(Input::has('email', 'password')){
			$email = Input::get('email');
			$password = Input::get('password');

			if (Auth::attempt(array('email' => $email, 'password' => $password))){
				// Success login
				return Redirect::intended();
			}else{
				// Fail login
				return Redirect::home()->with('message', '帳號或密碼錯誤');
			}
		}else{
			return Redirect::home()->with('message', '帳號或密碼錯誤');
		}
	}

	public function loginAjax(){
		if(Request::ajax() && Input::has('email', 'password')){
			$email = Input::get('email');
			$password = Input::get('password');

			if(Auth::attempt(array('email' => $email, 'password' => $password))){
				return Response::json(Auth::user());
			}
		}
			return Response::json('Error');
	}

	/*
	 * Login with facebook
	 * Redirect to fb login page.
	 */
	public function loginFB(){
		Facebook\FacebookSession::setDefaultApplication(Config::get('facebook.appId'), Config::get('facebook.secret'));
		$redirectURL = route(Config::get('facebook.callback_route'));
		$loginHelper = new Facebook\FacebookRedirectLoginHelper($redirectURL);
		return Redirect::to($loginHelper->getLoginUrl(array('email')));
	}

	/*
	 * Login with facebook callback
	 * Get the callback data to login or create user.
	 */
	public function loginFBCallback(){
		$code = Input::get('code');
		if (strlen($code) == 0)
			return Redirect::route('error')->with('message', 'There was an error communicating with Facebook');

		Facebook\FacebookSession::setDefaultApplication(Config::get('facebook.appId'), Config::get('facebook.secret'));
		$redirectURL = route(Config::get('facebook.callback_route'));
		$helper = new Facebook\FacebookRedirectLoginHelper($redirectURL);
		$session = NULL;
		try {
			$session = $helper->getSessionFromRedirect();
		} catch(Facebook\FacebookRequestException $ex) {
			// When Facebook returns an error
		} catch(\Exception $ex) {
			// When validation fails or other local issues
		}
		if ($session) {
			// Logged in, get user data
			try {

				$userProfile = (new Facebook\FacebookRequest(
					$session, 'GET', '/me'
				))->execute()->getGraphObject(Facebook\GraphUser::className());

				$uid = $userProfile->getId();

				//Find the uid is in the database or not
				$facebookData = FacebookData::whereUid($uid)->first();

				if(empty($facebookData)){
					//Test if email is in database.
					if(User::where('email', '=', $userProfile->getProperty('email'))->exists()){
						//Connect
						$user = User::where('email', '=', $userProfile->getProrerty('email'))->first();

						$facebookData = new FacebookData;
						$facebookData->uid = $uid;
						$facebookData->user_id = $user->id;
						$facebookData->save();

						Auth::login($user);
						return Redirect::intended();
					}else{
						//New user to the system, create user!
						$user = new User();
						$user->name = $userProfile->getName();
						$user->nick_name = $userProfile->getName();
						$user->email = $userProfile->getProperty('email');
						$user->high_school_id = 1;
						$user->department_id = 1;
						$user->grade = 1;
						$user->password = 'facebook';
						$user->save();

						$facebookData = new FacebookData;
						$facebookData->uid = $uid;
						$facebookData->user_id = $user->id;

						$facebookData->save();

						Auth::login($user);
						return Redirect::route('register.FB');
					}
				}else{
					//Exist user. go Login.
					$user = $facebookData->user;
					Auth::login($user);
				}

			} catch(Facebook\FacebookRequestException $e) {

				echo "Exception occured, code: " . $e->getCode();
				echo " with message: " . $e->getMessage();

			}
		}else{
			//Error no facebook session
			return Redirect::route('error')->with('message', 'There was an error communicating with Facebook');
			//echo "ERROR4";
		}
		echo '<a href="/login/FB">login</a>';
		return Redirect::to('/');
	}

	public function logout(){
		Auth::logout();
		return Redirect::to('/');
	}

	public function register(){
		$siteMap = App::make('SiteMap');
		$siteMap->pushLocation('註冊', route('register'));
		$departments = Department::lists('department_name', 'system_id');
		$type = 'choose';
		if(Route::currentRouteName() == 'register.email'){
			$type = 'email';
			$siteMap->pushLocation('一般註冊', route('register.email'));
		}else if(Route::currentRouteName() == 'register.FB'){
			$type = 'FB';
			$siteMap->pushLocation('臉書註冊', route('register.FB'));
		}
		App::make('TransferData')->addData('register-type', $type);
		App::make('TransferData')->addData('register-high-school-url', route('register.high'));
		return View::make('auth.register', array('type' => $type, 'departments' => $departments));
	}

	public function registerStore(){

		$rules = array();

		if(Input::get('facebook-uid', '') == ''){
			$rules = array(
				'email' => 'required|unique:users|max:255|email|required_without:facebook-uid',
				'name' => 'required_without:facebook-uid|max:10',
				'department_id' => 'required|exists:departments,system_id',
				'grade' => 'required|in:1,2,3,4',
				'high_school' => 'required',
				'password' => 'required_without:facebook-uid|min:6',
				're_password' => 'required_without:facebook-uid|same:password'
			);
		}else{
			$rules = array(
				'name' => 'required_without:facebook-uid|max:10',
				'department_id' => 'required|exists:departments,system_id',
				'grade' => 'required|in:1,2,3,4',
				'high_school' => 'required',
				'password' => 'required_without:facebook-uid|min:6',
				're_password' => 'required_without:facebook-uid|same:password'
			);
		}

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			if(Input::has('facebook-uid') == false){
				return Redirect::route('register.email')->withErrors($validator)->withInput();
			}else{
				return Redirect::route('register.FB')->withErrors($validator)->withInput();
			}
		}else{
			//success! save user to database~~
			if(Auth::check()){
				$user = Auth::user();
				$user->department_id = Input::get('department_id');
				$user->grade = Input::get('grade');
				$user->high_school_id = HighSchool::firstOrCreate(array('high_school_name' => Input::get('high_school')))->id;
				$user->gender = Input::get('gender');
				return Redirect::to('/');
			}else{
				$newUser = new User;
				$newUser->name = Input::get('name');
				$newUser->email = Input::get('email');
				$newUser->password = Hash::make(Input::get('password'));
				$newUser->department_id = Input::get('department_id');
				$newUser->grade = Input::get('grade');
				$newUser->high_school_id = HighSchool::firstOrCreate(array('high_school_name' => Input::get('high_school')))->id;
				$newUser->gender = Input::get('gender');
				$newUser->save();
				return Redirect::intended('/');
			}
		}
	}

	public function highSchool(){
		$query = Input::get('term', '');
		$highSchools = HighSchool::where('high_school_name', 'LIKE', '%'.$query.'%')->get();
		$data = array();
		foreach ( $highSchools as $result ):
			$data[] = $result->high_school_name;
		endforeach;

		return Response::json($data);
	}


	//$user->attachRole( $admin ); // Parameter can be an Role object, array or id.
	//$owner->perms()->sync(array($managePosts->id,$manageUsers->id));
	public function makePermissionAndRole(){
		//Can do only once~~

		//Role
		$developer = new Role;
		$developer->name = '開發者';
		$developer->save();

		$admin = new Role;
		$admin->name = '系統管理者';
		$admin->save();

		$unit = new Role;
		$unit->name = '社團/系所帳號';
		$unit->save();

		$user = new Role;
		$user->name = '使用者';
		$user->save();


		//Permission
		$global_admin = new Permission;
		$global_admin->name = 'global_admin';
		$global_admin->display_name = '全域管理';
		$global_admin->save();

		$edit_user = new Permission;
		$edit_user->name = 'edit_user';
		$edit_user->display_name = '編輯使用者';
		$edit_user->save();

		$announcement_admin = new Permission;
		$announcement_admin->name = 'announcement_admin';
		$announcement_admin->display_name = '管理公告';
		$announcement_admin->save();


		//sync permission to Role
		$developer->perms()->sync(array(
			$global_admin->id,
			$edit_user->id,
			$announcement_admin->id,
		));

		$admin->perms()->sync(array(
			$edit_user->id,
			$announcement_admin->id,
		));

	}

}
