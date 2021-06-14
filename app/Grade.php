<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = [
        'grade_title', 'grade_slug', 'publish', 'isActive','isDelete',
    ];

    // relationship with subject ; one subject has many grades
    public function subjects(){
        return $this->belongsToMany(Subject::class)->withTimestamps();
    }
}
