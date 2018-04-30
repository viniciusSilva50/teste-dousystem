<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityPost extends FormRequest
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
            'name' => 'required|max:255',
            'description' => 'required|max:600',
            'begin-date' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome da atividade é obrigatório!',
            'name.max' => 'O nome da atividade de possuir no máximo 255 caractéres.'

        ];
    }
}
