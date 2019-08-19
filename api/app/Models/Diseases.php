<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Diseases extends Model
{
    protected $fillable = ['name', 'description', 'img'];


    public function getImgAttribute($img)
    {
        return base64_encode(Storage::get("public/user-images/$img")); 
    } 
}
