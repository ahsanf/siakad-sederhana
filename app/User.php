<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'role', 'name', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function courses(){
        $this->belongsTo('App\Courses', 'user_id', 'id');
    }

    public function studies(){
        $this->belongsTo('App\Studies', 'user_id', 'id');
    }

    public function credits(){
        $this->belongsTo('App\Credits', 'user_id', 'id');
    }
}
