<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormacaoCreate extends FormRequest
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
            'tipo' => 'required|string',
            'nome' => 'required|string',
            'entidade_organizadora' => 'required|string',
            'local' => 'required|string',
            'data' => 'required|string',
            'nacional' => 'required|string',
            'nota' => 'required|string',
            'observacoes' => 'required|string'
        ];
    }
}
