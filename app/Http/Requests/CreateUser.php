<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUser extends FormRequest
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
            'name' => 'required|string|min:2|max:255',
            'username' => 'required|string|min:3|max:100|unique:users',
            'email' => 'required|string|email|unique:users',
            'user_type' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
}
