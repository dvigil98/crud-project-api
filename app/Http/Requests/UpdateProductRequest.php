<?php

namespace App\Http\Requests;

use App\Traits\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateProductRequest extends FormRequest
{
    use ApiResponse;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => 'required',
            'code' => 'required',
            'name' => 'required',
            'description' => 'required',
            'purchase_price' => 'required',
            'sale_price' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'La categoría es requerida',
            'code.required' => 'El código es requerido',
            'name.required' => 'El nombre es requerido',
            'description.required' => 'La descripción es requerida',
            'purchase_price.required' => 'El precio de compra es requerido',
            'sale_price.required' => 'El precio de venta es requerido'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->badRequest($validator->errors()));
    }
}
