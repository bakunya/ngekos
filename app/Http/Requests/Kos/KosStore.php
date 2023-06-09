<?php

namespace App\Http\Requests\Kos;

use Illuminate\Foundation\Http\FormRequest;

class KosStore extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'post' => 'string'
        ];
    }
}
