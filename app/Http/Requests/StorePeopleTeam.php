<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePeopleTeam extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:posts|max:255',
            'born' => 'required| date',
            'email' => 'required| email',
            'role_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Você Precisa Preencher esse campo',
            'born.required' => 'Você Precisa Preencher esse campo',
            'email.required' => 'Você Precisa Preencher esse campo',
            'role_id.required' => 'Por favor, selecione alguma opção'
        ];
    }
}
