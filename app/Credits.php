<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credits extends Model
{
    protected $table = 'credits';
    protected $fillable = [
        'user_id',
        'credit'
    ];

    public function user(){
        return $this->hasMany('App\User', 'user_id', 'id');
    }
}
