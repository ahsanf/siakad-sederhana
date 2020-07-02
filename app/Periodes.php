<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodes extends Model
{
    protected $table = 'periodes';
    protected $fillable = [
        'year',
        'semester',
        'register_start',
        'register_end'
    ];

    public function studies(){
        return $this->hasMany('App\Studies', 'id' , 'periode_id');
    }
}
