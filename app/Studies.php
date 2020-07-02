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
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function periode(){
        return $this->belongsTo('App\Periodes', 'periode_id', 'id');
    }

    public function course(){
        return $this->belongsTo('App\Courses', 'course_id', 'id');
    }
}
