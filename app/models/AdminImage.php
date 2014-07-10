<?php
/**
 * Created by PhpStorm.
 * 
 * User: green
 * Date: 2014/6/20
 * Time: 21:05
 *
 * @property integer $id
 * @property string $display_name
 * @property string $url
 * @property integer $order
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */

class AdminImage extends Eloquent{

	protected $table = 'admin_images';

}