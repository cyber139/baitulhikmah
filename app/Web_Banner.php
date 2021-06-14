<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Web_Banner extends Model
{
    //
    protected $guarded = []; 

    public function getBannerImageAttribute($value){

        if($value == null){
            return $value;
        }


        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        
     
        return asset('storage/' . $value);
    }
}
