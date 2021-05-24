<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id', 'subject_id', 'grade_id','isActive','isDelete',
    ];


    public function users(){
        return $this->belongsTo(User::class)->withTimestamps();
    }
}
