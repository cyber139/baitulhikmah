<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded =[];
    //
    // Relationship with roles ; one permissions has many different role
    public function roles(){
        return $this->belongsToMany(Role::class);
    }
    // Relationship with users ; one permissions has many different users
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
