<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $guarded = [
        'id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user_group()
    {
        return $this->belongsTo('App\UserGroup');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function setPasswordAttribute($password)
    {
        if ( !empty($password) ) {
            $this->attributes['password'] = bcrypt($password);
        }
    }
    
    public function super_admin()
    {
        return $this->hasOne('App\SuperAdmin');
    }
    
    public function internal()
    {
        return $this->hasOne('App\Internal');
    }
    
    public function eksternal()
    {
        return $this->hasOne('App\Eksternal');
    }
}
