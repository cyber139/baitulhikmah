<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded = []; 

    public function teachers()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // public function getPostImageAttribute($value){
    //     if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
    //         return $value;
    //     }

    public function getPostImageAttribute($value){

        if($value == null){
            return $value;
        }


        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        
     
        return asset('storage/' . $value);
    }

}
