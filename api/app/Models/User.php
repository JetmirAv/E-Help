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
        'doctor',
        'surname',
        'email',
        'img',
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

    public function setEmailAttribute($email)
    {
        if ( !empty($email) ) {
            $this->attributes['email'] = strtolower($email);
        }
    }   


    public function getEmailAttribute($email)
    {
        if ( !empty($email) ) {
            return strtolower($email);
        }
    }  

    public function role(){
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function Doctor(){
        return $this->belongsTo(User::class, 'doctor');
    }

    public function patients(){
        return $this->hasMany(User::class, 'doctor', 'id');
    }


    public function disease(){
        return $this->belongsToMany(Diseases::class, 'patient_diseases', 'patient', 'disease')->withPivot('id');
    }

    public function chats(){
        return $this->hasMany(Chat::class, 'sender');
    }
}
