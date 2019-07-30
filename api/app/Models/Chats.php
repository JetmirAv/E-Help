<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chats extends Model
{
    protected $fillable = [
        'sender',
        'receiver',
        'content' 
    ];

    public function sender(){
        return $this->belongsTo('App\Models\User', 'sender');
    }

    public function receiver(){
        return $this->belongsTo('App\Models\User', 'receiver');
    }
}
