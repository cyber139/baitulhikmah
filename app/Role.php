<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded =[];
    //
    // relationship with permission; one role has many permission
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    // relationship with user ; one role has many user
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
