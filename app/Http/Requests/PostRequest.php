<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Permitimos la validacion
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|min:5',
            'descripcion' => 'required|min:50',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'El título es obligatorio.',
            'titulo.min' => 'El título debe tener al menos 5 caracteres.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.min' => 'La descripción debe tener al menos 50 caracteres.',
            'imagen.image' => 'No es una imagen',
            'imagen.mimes' => 'Tipo imagen es incorrecto',
            'imagen.max' => 'Tamaño máximo superado'
        ];
    }
}
