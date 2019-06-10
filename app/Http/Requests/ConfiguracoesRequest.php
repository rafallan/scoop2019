<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfiguracoesRequest extends FormRequest
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
                'data_inicio'                  => 'required|date_format: "Y-m-d H:i:s"',
                'data_fim'                     => 'required|after:data_inicio|date_format:"Y-m-d H:i:s"',
            ];
        }else{
            return [
                'data_inicio'                  => 'required|date_format: "Y-m-d H:i:s"',
                'data_fim'                     => 'required|after:data_inicio|date_format:"Y-m-d H:i:s"',
            ];
        }
    }

    public function messages()
    {
        return [
            'required'              => 'Esse campo é obrigatório',
            'date_format'           => 'O formato da data é inválido',
            'after'                 => 'O data de término deve ser posterior à data de início',
        ];
    }
    
}