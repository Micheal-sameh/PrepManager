<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'string',
            'email' => 'email|unique:users',
            'phone' =>'unique:users',
            'grad' => 'integer|in:1,2,3',
            'role' => 'integer|exists:roles,id',
            'mother_name' => 'string',
            'mother_phone' => 'string|min:11|max:11',
            'father_name' => 'string',
            'father_phone' => 'string|min:11|max:11',
            'address' => 'string',
            // 'fasl' => 'integer|exists:fasls,id',
        ];
    }
}
