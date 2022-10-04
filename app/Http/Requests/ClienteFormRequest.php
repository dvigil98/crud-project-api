<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
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
            'nombre' => 'required',
            'telefono' => 'required',
            'email' => 'required|email',
            'dni' => 'required',
            'direccion' => 'required'
        ];
    }

    public function messages() {
        return [
            'nombre.required' => 'El nombre es requerido',
            'telefono.required' => 'El telefono es requerido',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email debe ser valido',
            'dni.required' => 'El DNI es requerido',
            'direccion.required' => 'La direccion es requerida',
        ];
    }
}
