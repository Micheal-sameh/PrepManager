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
            'event_category' => $this->whenLoaded('eventCategory', fn () => $this->eventCategory->name),
            'name' => $this->name,
            'description' => $this->description,
            'goal' => $this->goal,
            'location' => $this->location,
            'points_1' => $this->points_1,
            'points_2' => $this->points_2,
            'points_3' => $this->points_3,
            'created_by' => $this->whenLoaded('createdBy',fn() => $this->createdBy->name),
            // 'members' => $this->whenLoaded('createdBy',$this->createdBy->name),
        ];
    }
}
