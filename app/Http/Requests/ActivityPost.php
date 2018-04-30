<?php

namespace App\Http\Requests;

use App\Repository\StatusRepository;
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
        $notCompletedStatus = StatusRepository::notCompletedStatusStatic($this->status);
        return [
            'name' => 'required|max:255',
            'description' => 'required|max:600',
            'begin_date' => 'required|date_format:d/m/Y' . (is_null($this->end_date)? '' : '|before_or_equal:end_date'),
            'end_date' =>  ($notCompletedStatus? 'nullable|' : 'required|') . 'date_format:d/m/Y|after_or_equal:begin_date'
        ];
    }

    public function messages()
    {

        return [
            'name.required' => 'O nome da atividade é obrigatório!',
            'name.max' => 'O nome da atividade de possuir no máximo 255 caractéres!',
            'description.required' => 'A descrição da atividade é obrigatório!',
            'description.max' => 'A descrição da atividade de possuir no máximo 255 caractéres!',
            'begin_date.required' => 'A data inicial é obrigatória!',
            'begin_date.date_format' => 'Data inicial inválida!',
            'begin_date.before_or_equal' => 'Data inicial deve ser igual ou menor a data final!',
            'end_date.required' => 'A data final é obrigatória para o status concluido!',
            'end_date.date_format' => 'Data final inválida!',
            'end_date.before_or_equal' => 'Data final deve ser igual ou maior a data inicial!',
        ];
    }
}
