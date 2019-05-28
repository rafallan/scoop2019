<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfilRequest extends FormRequest
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

        if($this->method() == 'PATCH' || $this->method() == 'PUT')
        {

            return [
                'name'                      => 'required',
                'email'                     => 'required|email|max:255|unique:users,email,' .$this->perfil,
            ];
        }else{
            return [
                'name'                      => 'required',
                'email'                     => 'required|email|max:255|unique:users,email',
                
            ];
        }
    }

    public function messages()
    {
        return [
            'required'      => 'Esse campo é obrigatório',
            'max'           => 'Digite no máximo :max',
            'email'         => 'Digite um e-mail válido',
            'unique'        => 'E-mail já cadastrado',
            'confirmed'     => 'Os campos senha e confirmação da senha devem ser iguais',
        ];
    }
    
}