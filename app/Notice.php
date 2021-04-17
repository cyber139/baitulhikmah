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

    public function getNoticeImageAttribute($value) {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
        }
}
