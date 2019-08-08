<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientDoctor extends JsonResource
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
            'doctor' => $this->doctor,
            'patient' => $this->patient,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'Doctor' => $this->Doctor,
            'Patient' => $this->Patient,
        ];
    }
}
