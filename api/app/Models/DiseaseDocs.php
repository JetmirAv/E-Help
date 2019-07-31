<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiseaseDocs extends Model
{
    protected $fillable = [
        'disease_id',
        'path'
    ];

    public function disease(){
        return $this->belongsTo('App\Models\PatientDisease', 'disease_id');
    }
}
