<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'string',
            'goal' => 'required|string',
            'location' => 'string',
            'bonus_1' => 'required|integer|min:0',
            'bonus_2' => 'integer|min:0',
            'bonus_3' => 'integer|min:0',
        ];
    }
}
