<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];

    public function isAdmin(){
        return $this->id == 1;
    }

    public function isDoctor(){
        return $this->id == 2;
    }

    public function isPatient(){
        return $this->id == 3;
    }

    public function users(){
        return $this->hasMany('App\Models\User', 'role_id');
    }
}
