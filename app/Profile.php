<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //

    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id', 'full_name', 'address','phone_no','guardian_name1','gphone_no1','guardian_name2','gphone_no2',
    ];
    // protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
