<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtividadeCreate extends FormRequest
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
            'titulo' => 'required|string',
            'nome' => 'required|string',
            'data' => 'required|string',
            'autores' => 'required|string',
            'abstract' => 'required|string',
            'observacoes' => 'required|string'
        ];
    }
}
