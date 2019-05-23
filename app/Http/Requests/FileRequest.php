<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
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
            'name'         => 'required|min:3',
            'description'    => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=> 'El :attribute es requerido.',
            'name.min' => 'El :attribute debe tener al menos 3 caracteres',
            'description.required'=> 'La :attribute es requerida.',
        ];
    }

    public function attributes(){
        return [
            'name'     => 'nombre del archivo',
            'description' => 'descripción del archivo'

        ];
    }
}
