<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{

    use Notifiable;

    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'role_id',
        'name',
        'surname',
        'email',
        'password',
        'birthday',
        'address',
        'city',
        'state',
        'postal',
        'phone_number'
    ];


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function setPasswordAttribute($password)
    {
        if ( !empty($password) ) {
            $this->attributes['password'] = bcrypt($password);
        }
    }    

    public function role(){
        return $this->belongsTo('App\Models\Role', 'role_id');
    }

    public function patients(){
        return $this->belongsToMany('App\Models\User', 'doctor_patients', 'doctor', 'patient')->withPivot('id');
    }

    public function doctors(){
        return $this->belongsToMany('App\Models\User', 'doctor_patients', 'patient', 'doctor')->withPivot('id');
    }

    public function disease(){
        return $this->hasMany( Disease , 'doctor_patients', 'patient', 'doctor')->withPivot('id');
    }

    public function chats(){
        return $this->hasMany('App\Models\Chat', 'sender');
    }
}
