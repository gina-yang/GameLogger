<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $primaryKey = 'gameId';
    public $timestamps = true;

    public function comments(){
        return $this->hasMany('App\Comment', 'gameId');
    }
}
