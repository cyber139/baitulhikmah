<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id', 'grade_id','isActive','isDelete',
    ];


    public function users(){
        return $this->belongsTo(User::class)->withTimestamps();
    }

    // public function submissions(){
    //     return $this->hasMany(Submission::class,'student_id')->withTimestamps();
    // }

}
