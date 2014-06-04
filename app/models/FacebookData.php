<?php
/**
 * User: green
 * Date: 2014/6/3
 * Time: 23:18
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $uid
 * @property string $access_token
 * @property string $access_token_secret
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \User $user
 */


class FacebookData extends Eloquent{

	protected $table = 'facebook_data';


	/**
	 * Get the user data
	 *
	 * @return User (model
	 */
	public function user(){
		return $this->belongsTo('User', 'user_id');
	}
}