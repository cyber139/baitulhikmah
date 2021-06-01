<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
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

    public function notices(){
        return $this->hasMany(Notice::class);
    }

    public function teachers(){
        return $this->hasMany(Teacher::class);
    }

    public function students(){
        return $this->hasMany(Student::class);
    }

    // Relationship with permission ; one user has many different permission
    public function permission(){
        return $this->belongsToMany(Permission::class);
    }

    // Relationship with roles ; one user has many different roles
    public function roles(){
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    // Limit users according to role
    public function userHasRole($role_name){
        foreach($this->roles as $role){
            if(Str::lower($role_name) == Str::lower($role->name))
                return true;
        }

        return false;
    }

    public function isAdmins()
        {
            return $this->admin ? true : false; // this looks for an admin column in your users table
        }

        public function profile(){
            return $this->hasOne(Profile::class);
        }
}
