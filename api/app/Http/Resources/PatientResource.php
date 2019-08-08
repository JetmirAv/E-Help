<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'role_id' => $this->role_id,
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'img' => $this->img,
            'city' => $this->city,
            'birthday' => $this->birthday,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'state' => $this->state,
            'postal' => $this->postal,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'doctors' => $this->doctors,
            'diseases' => $this->disease,
            'role' => $this->role,
        ];
    }
}
