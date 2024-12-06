<?php

namespace App\Http\Resources;

use App\Enums\FaslMemberType;
use App\Enums\Grads;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FaslMembersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_name' => $this->whenLoaded('user',$this->user->name),
            'type' => FaslMemberType::getStringValue($this->type),

        ];
    }
}
