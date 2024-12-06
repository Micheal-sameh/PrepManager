<?php

namespace App\Http\Resources;

use App\Enums\Grads;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FaslResource extends JsonResource
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
            'grad' => Grads::getStringValue($this->grad),
            'created_by' => $this->whenLoaded('createBy', $this->createBy->name),
            'members' => $this->whenLoaded('members', function(){
                return FaslMembersResource::collection($this->members);
                // return $this->members->map(fn ($member) => $member->user->name);
            }),

        ];
    }
}
