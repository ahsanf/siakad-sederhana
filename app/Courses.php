<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    //
    protected $table = 'courses';

    protected $fillabe = [
        'user_id',
        'name',
        'credit'
    ];

    public function user(){
        return $this->hasMany('App\User', 'user_id', 'id');
    }

    public function studies()
    {
        return $this->belongsTo('App\Studies', 'user_id', 'id');
    }
}
