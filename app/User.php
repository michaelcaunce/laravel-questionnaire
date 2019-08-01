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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles() {
      return $this->belongsToMany(Role::class);
    }

    public function questionnaires() {
      return $this->hasMany('App\questionnaires');
    }

    /*
          *   check if a role is attached to a user
          */
     public function hasRole($role) {
         if (is_string($role)){
             return $this->roles->contains('name', $role);
         }
         return !! $role->intersect($this->roles)->count();
     }

     /*
         *  assign a role to a user
         */
    public function assignRole($role) {
        return $this->roles()->sync(
            Role::whereName($role)->firstOrFail()
        );
    }
}
