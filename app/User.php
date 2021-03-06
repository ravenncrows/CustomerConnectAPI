<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role','users_roles');
    }

    public function hasRole($check)
    {
        return in_array($check,array_fetch($this->roles->toArray(),'name'));        
    }

    public function assingRole($role)
    {
        $this->roles()->attach($role->id);
    }
}
