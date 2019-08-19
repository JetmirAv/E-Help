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
        return $this->belongsTo(User::class, 'patient');
    }


    public function disease(){
        return $this->belongsTo(Diseases::class, 'disease');
    }


}
