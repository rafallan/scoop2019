<?php

namespace App\Http\Requests;

use App\Models\Submissao;

use Illuminate\Foundation\Http\FormRequest;

class SubmissaoRequest extends FormRequest
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
                'tipo'               => 'required',
                'titulo'             => 'required|max:255|unique:submissoes,titulo,' .$this->submisso,
                'autor'              => 'required|max:255',
                'email'              => 'required|email|max:255|confirmed',
                'email_confirmation'  => 'required',
                'telefone'           => 'required|max:50',
                'lattes'             => 'required|url|max:255',
                'area_id'            => 'required',
                'resumo'             => 'required|max:300',
                'materiais'          => 'required|max:300',
                'instituicao'        => 'required|max:255',
                'disponibilidade'    => 'required|min:1|max:5',
            ];
        }else{
            return [
                'tipo'               => 'required',
                'titulo'             => 'required|max:255|unique:submissoes,titulo',
                'autor'              => 'required|max:255',
                'email'              => 'required|email|max:255|confirmed',
                'email_confirmation'  => 'required',
                'telefone'           => 'required|max:50',
                'lattes'             => 'required|url|max:255',
                'area_id'            => 'required',
                'resumo'             => 'required|max:300',
                'materiais'          => 'required|max:300',
                'instituicao'        => 'required|max:255',
                'dispo'             => 'required|min:1|max:5',
            ];
        }

        
    }

    public function messages()
    {
        return [
            'required'      => 'Esse campo é obrigatório',
            'max'           => 'Digite no máximo :max',
            'email'         => 'Digite um e-mail válido',
            'url'           => 'Digite uma url válida',
            'unique'        => 'Título já cadastrado',
            'confirmed'     => 'O e-mail e a confirmação do e-mail devem ser iguais',
        ];
    }
}