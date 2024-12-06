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
            'created_by' => $this->whenLoaded('creat', $this->creat->name),
            // 'members' => $this->whenLoaded('members', function(){
            //     return $this->members->map(fn ($member) => $member->user->name);
            // }),

        ];
    }
}
