<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studies extends Model
{
    protected $table = 'studies';
    protected $fillable = [
        'user_id',
        'periode_id',
        'course_id',
        'grade',
    ];

    public function user(){
        return $this->hasMany('App\User', 'user_id', 'id');
    }

    public function periode(){
        return $this->hasMany('App\Periodes', 'periode_id', 'id');
    }

    public function course(){
        return $this->hasMany('App\Courses', 'course_id', 'id');
    }
}
