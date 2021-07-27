<?php

namespace App; //The namespace we are within

use Illuminate\Contracts\Auth\MustVerifyEmail;
//User Model we name Authenticatable that this User class inherits from 
//This class Authenticatable has certain traits that we will use here from Laravel src
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Gate;

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
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function hasAnyRoles($roles)
    {
        if($this->role()->whereIn('name', $roles)->first())
            return true;
          
        return false;
    }

    public function hasRole($role)
    {
        if($this->role()->where('name', $role)->first())
            return true;

        return false;
    }
}
