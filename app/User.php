<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    // To block the user when using passport authentication (For closing the account)
    public function findForPassport($identifier) {
        return User::orWhere('email', $identifier)->where('status', '1')->first();
    }

    public function orders() {
        return $this->hasMany('App\Order');
    }

    public function roles() {
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
    }

    public function isAdmin() {
        
        if($this->roles()->where('name', 'admin')->first()) {
            return true;
        }

        return false;
    }

}
