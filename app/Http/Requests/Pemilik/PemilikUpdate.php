<?php

namespace App\Http\Requests\Pemilik;

use App\Models\Pemilik;
use Illuminate\Foundation\Http\FormRequest;

class PemilikUpdate extends FormRequest
{
    public function prepareForValidation()
    {
        $model = new Pemilik;
        
        $this->merge([
            'id' => $model->select('id_user')->find($this->route('id'))->id_user,
        ]);
    }


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
            'telp' => 'required|string|max:15',
            'fullname' => 'required|string|max:50',
            'email' => 'nullable|email|max:50|unique:users,email,'.$this->get('id').',id',
            'alamat' => 'nullable|string|max:180',
            'nik' => 'nullable|integer|max:16|min:16',
        ];
    }
}
