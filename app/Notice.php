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
}
