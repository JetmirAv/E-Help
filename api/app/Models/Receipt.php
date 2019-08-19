<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'disease_id',
        'content'
    ];

    public function disease(){
        return $this->belongsTo(Diseases::class, 'id');
    }
    
    public function patient(){
        return $this->belongsTo(User::class, 'id');
    }

    public function doctor(){
        return $this->belongsTo(User::class, 'id');
    }
}
