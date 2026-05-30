<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NoteRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => [
                'required',
                'string',
                'max:120'
            ],

            'contenido' => [
                'required',
                'string'
            ],

            'categoria' => [
                'required'
            ],

            'fijada' => [
                'nullable',
                'boolean'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required'    => 'Es necesario que ingreses un título.',
            'titulo.max'         => 'Has excedido el límite de 120 caracteres para el título.',
            'contenido.required' => 'No olvides redactar el cuerpo del contenido.',
            'categoria.required' => 'Debes asignar una categoría al registro.',
        ];
    }
}
