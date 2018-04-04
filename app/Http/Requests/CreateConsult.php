<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateConsult extends FormRequest
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
            'user_id' => 'required|integer',
            'iniciais_paciente' => 'required|string|max: 3',
            'primeira_consulta' => 'required',
            'sexo' => 'required',
            'idade' => 'required',
            'origem' => 'required',
            'especialidade_origem' => 'required',
            'destino' => 'required',
            'grupo_ICD_10' => 'required',
            'ICD_10_primario' => 'required',
            'ICD_10_secundario' => 'required',
            'ICD_10_secundario_II' => 'required',
            'ICD_10_secundario_III' => 'required',
            'ICD_10_secundario_IV' => 'required',
            'ICD_10_secundario_V' => 'required',
            'obito' =>  'required',
            'ICD_10_obito' => 'required',
            'alta_destino' => 'required',
            'alta_especialidade' => 'required'
        ];
    }
}
