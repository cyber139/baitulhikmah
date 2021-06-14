<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    //
    // protected $guarded = []; 
    protected $primaryKey = 'id';
    protected $fillable = [
        'title', 'file', 'body','student_id','post_id','teacher_id'
    ];

    public function posts()
    {
        return $this->belongsTo(Post::class,'post_id');
    }

    public function students()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public function getFileAttribute($value){

        if($value == null){
            return $value;
        }


        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        
     
        return asset('storage/' . $value);
    }

}
