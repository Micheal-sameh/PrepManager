<?php

namespace App\Http\Resources;

use App\Enums\FaslMemberType;
use App\Enums\Grads;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'goal' => $this->goal,
            'location' => $this->location,
            'bonus_1' => $this->bonus_1,
            'bonus_2' => $this->bonus_2,
            'bonus_3' => $this->bonus_3,
            'created_by' => $this->whenLoaded('createdBy',$this->createdBy->name),
            // 'members' => $this->whenLoaded('createdBy',$this->createdBy->name),
        ];
    }
}
