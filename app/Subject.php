<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = [
        'subject_title', 'subject_slug', 'publish', 'isActive','isDelete',
    ];
    // relationship with grades ; one grades has many subjects
    public function grades(){
        return $this->belongsToMany(Grade::class)->withTimestamps();
    }


}
