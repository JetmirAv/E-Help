<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorPatient extends Model
{
    protected $fillable = [
        'doctor',
        'patient'
    ];

    public function Doctor(){
        return $this->belongsTo('App\Models\User', 'doctor');
    }

    public function Patient(){
        return $this->belongsTo('App\Models\User', 'patient');
    } 

    public function chats(){
        return $this->hasMany('App\Models\Chat', 'doctor_patient_id');
    }
}
