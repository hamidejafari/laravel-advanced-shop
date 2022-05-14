<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'old_id','name', 'email', 'password','mobile_confirm','status','mobile','confirm_code','birthday',
        'email_confirm','admin', 'family','address_id','gender','temp_pass','avatar','last_login','user_registered'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function hasPermission($access)
    {
        $accessCount = count(explode('.', $access));

        foreach ($this->roles as $userRole) {

            $allPermissions = unserialize($userRole->permission);
            if ($allPermissions['fullAccess'] == 1) {
                return true;
            }
            if ($accessCount == 1) {
                if (array_key_exists($access, $allPermissions)) {
                    return true;
                }
            }
            if (is_array($allPermissions)) {

                if (array_key_exists($access, Arr::dot($allPermissions))) {
                    return true;
                }

                return false;
            }

            return false;
        }

        return false;
    }


    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function assignRole($role)
    {
        return $this->roles()->attach($role);
    }

    public function deleteRole($role)
    {
        return $this->roles()->detach($role);
    }
    public function address()
    {
        return $this->belongsToMany('App\Models\Address')->where('default_address',1);
    }

}
