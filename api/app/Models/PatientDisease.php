<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientDisease extends Model
{
    protected $fillable = [
        'patient',
        'name',
        'description'
    ];

    public function patient(){
        return $this->belongsTo('App\Models\User', 'patient');
    }

    public function documents(){
        return $this->hasMany('App\Models\DiseaseDocs', 'disease_id');
    }
}
