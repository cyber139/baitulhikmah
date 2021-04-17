<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    //
    // protected $fillable = ['title',]
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    // Accessor
    // public function getNoticeImageAttribute($value) {
    //     if (strpos($value, 'https://')!== FALSE || strpos($value,'http://') !== FALSE) {
    //         return asst($value);
    //     }
    //     return asset('storage/'.$value);
    // }

    public function getPostImageAttribute($value)
{
    if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
        return $value;
    }
    
 
    return asset('storage/' . $value);
}

    // public function getNoticeImageAttribute($value) {
     
    //     return asset($value);
    //     }

    // Mutator
    // public function setNoticeImageAttribute($value) {

    //     $this->attributes['post_image'] = asset($value);

    // }
}
