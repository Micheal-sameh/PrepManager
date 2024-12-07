<?php

namespace App\Http\Resources;

use App\Enums\FaslMemberType;
use App\Enums\Grads;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'created_by' => $this->whenLoaded('createdBy',$this->createdBy->name),
        ];
    }
}
