<?php

namespace App\Http\Requests;

use App\Enums\Grads;
use Illuminate\Foundation\Http\FormRequest;

class FaslUpdateRequest extends FormRequest
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
            'name' => 'string|unique:fasls',
            'grad' => 'integer|in:' . implode(',', array_column(Grads::all(), 'value')),
        ];
    }
}
