<?php

namespace App\Http\Requests;

use App\Enums\FaslMemberType;
use Illuminate\Foundation\Http\FormRequest;

class FaslMemberUpdateRequest extends FormRequest
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
            'fasl_id'   => 'integer|exists:fasls,id',
            'type'      => 'integer|in:' . implode(',', FaslMemberType::values()),
        ];
    }
}
