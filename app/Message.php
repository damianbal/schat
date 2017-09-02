<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = [
        'user_id', 'message', 'color'
    ];

    public function user()
    {
        return $this->belongsTo('App\\User', 'user_id');
    }
}
