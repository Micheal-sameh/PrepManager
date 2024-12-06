<?php

namespace App\Http\Requests;

use App\Enums\FaslMemberType;
use Illuminate\Foundation\Http\FormRequest;

class FaslMemberCreateRequest extends FormRequest
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
            'fasl_id' => 'required|integer|exists:fasls,id',
            'user_id' => 'required|integer|exists:users,id|unique:fasl_members',
            'type' => 'required|integer|in:' . implode(',', FaslMemberType::values()),
        ];
    }
}
