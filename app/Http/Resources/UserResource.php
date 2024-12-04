<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'grad' => $this->grad,
            'fasl' => $this->fasl,
            'mother_name' => $this->mother_name,
            'mother_phone' => $this->mother_phone,
            'father_name' => $this->father_name,
            'father_phone' => $this->father_phone,
            'address' => $this->address,


        ]
    }
}
