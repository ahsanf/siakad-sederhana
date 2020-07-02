<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    //
    protected $table = 'courses';

    protected $fillable = [
        'user_id',
        'name',
        'credit'
    ];

    public function user(){
        return $this->hasMany('App\User', 'user_id', 'id');
    }

    public function studies()
    {
        return $this->hasMany('App\Studies', 'id', 'course_id');
    }
}
