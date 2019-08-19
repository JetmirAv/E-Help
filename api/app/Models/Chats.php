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
        return $this->belongsTo(User::class, 'sender');
    }

    public function receiver(){
        return $this->belongsTo(User::class, 'receiver');
    }
}
