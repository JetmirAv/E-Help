<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\FileUploadTrait;
 
class DoctorResource extends JsonResource
{
    use FileUploadTrait;
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
            'birthday' => $this->birthday,
            'phone_number' => $this->phone_number,
            'city' => $this->city,
            'address' => $this->address,
            'state' => $this->state,
            'postal' => $this->postal,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'patients' => $this->patients,
            'role' => $this->role,
        ];
    }
}
