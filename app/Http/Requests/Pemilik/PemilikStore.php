<?php

namespace App\Http\Requests\Pemilik;

use Illuminate\Foundation\Http\FormRequest;

class PemilikStore extends FormRequest
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
            'fullname' => 'required|string|max:50',
            'alamat' => 'nullable|string|max:180',
            'nik' => 'nullable|string|max:16|min:16',
            'email' => 'nullable|email|max:50|unique:users,email',
            'telp' => 'required|string|max:15',
            'password' => 'required|string|min:8',
        ];
    }
}
