<?php

use Zizaco\Entrust\EntrustPermission;

/**
 * Permission
 *
 * @property integer $id
 * @property string $name
 * @property string $display_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Config::get('entrust::role[] $roles
 */
class Permission extends EntrustPermission{

}