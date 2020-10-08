<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'commentId';
    public $timestamps = true;

    public function game(){
        return $this->belongsTo('App\Game', 'gameId');
    }
}
