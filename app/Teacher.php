<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
        /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int',
        'user_id'=> 'int',
        'subject_id'=> 'int' ,
        'grade_id'=> 'int' ,
    ];
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id', 'subject_id', 'grade_id','isActive','isDelete',
    ];


    public function users(){
        return $this->belongsTo(User::class)->withTimestamps();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
