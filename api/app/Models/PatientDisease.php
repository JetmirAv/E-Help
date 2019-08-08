<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientDisease extends Model
{
    protected $fillable = [
        'patient',
        'disease',
    ];

    public function patient(){
        return $this->belongsTo('App\Models\User', 'patient');
    }


    public function disease(){
        return $this->belongsTo('App\Models\Diseases', 'disease');
    }


    public function documents(){
        return $this->hasMany('App\Models\DiseaseDocs', 'disease_id');
    }
}
