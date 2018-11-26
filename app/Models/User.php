<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class User extends AuthenticatableUser
{
    use Notifiable, HasRoles;
    use AuthenticableTrait;
    
    protected $with = [
        'device_node',
        'roles',  
        'permissions',
        'image',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'password',
        'gender',
        'country',
        'status',
        'location',
        'address',
        'image_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function device()
    {
        return $this->hasMany('App\Models\Device','user_id');
    }

    public function device_node()
    {
        return $this->hasMany('App\Models\DeviceNode','owner_id');
    }

    public function access()
    {
        return $this->hasMany('App\Models\Access');
    }

    public function event()
    {
        return $this->hasMany('App\Models\Event');
    }

    public function event_log()
    {
        return $this->hasMany('App\Models\EventLog');
    }

    public function image()
    {
        return $this->belongsTo('App\Models\Image');
    }


      

}
