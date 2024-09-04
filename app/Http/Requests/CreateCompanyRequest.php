<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'name' => 'required',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'email.required' => 'El correo es requerido',
            'email.string' => 'El correo debe ser un texto',
            'email.email' => 'El correo debe ser una dirección de correo electrónico válido',
            'email.max' => 'El correo no debe exceder más de 255 caracteres',
            'email.unique' => 'El correo está registrado en una cuenta',
            'password.required' => 'La contraseña es requerida',

            'company_phone' => 'El teléfono es requerido',
            'nit' => 'El nit es requerido',
            'kind_person' => 'El tipo de persona es requerido',
            'location' => 'La dirección es requerida',
            'city' => 'La ciudad es requerida',
            'logo' => 'El logo es requerido',
        ];
    }
}
