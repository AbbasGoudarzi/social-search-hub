<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'query' => 'required|string|min:2',
            'source' => 'string|min:2',
            'from_date' => 'date_format:Y-m-d H:i:s',
            'to_date' => 'date_format:Y-m-d H:i:s',
            'per_page' => 'integer|min:1'
        ];
    }
}
