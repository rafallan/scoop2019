<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RecuperarSenhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('recuperar-senha');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'email' => 'required|email'
        ];

        $messages = [
            'required' => '<span class="text-danger"><i class="fa fa-times-circle-o"></i> Este campo é obrigatório</span>',
            'email' => '<span class="text-danger"><i class="fa fa-times-circle-o"></i> Informe um e-mail válido</span>',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('mensagem', '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i>
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Preencha os campos corretamente!</div>');

        }
        else{
            $user = User::where('email',$request->email)->first();

            if(is_null($user)){
                return redirect()->back()
                    ->with('mensagem','<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i>
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Usuário não existe!!</div>');
            }else{
                $senha = substr(md5(rand()),0,6);
                $attributes = ['password' => Hash::make($senha)];

                if( User::where('email',$request->email)->update($attributes) ){

                    $data = [
                        'user' => $user,
                        'senha' 	=> $senha
                    ];

                    Mail::send('emails.recuperar_senha', $data, function($mail) use ($user){
                        $mail->to($user->email);
                        $mail->subject("SCOOP 2019 - RECUPERAÇÃO DE SENHA");
                    });

                    return redirect(route('login'))
                        ->with('mensagem','<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Uma nova senha foi enviada para o seu e-mail!!</div>');

                }else{
                    return redirect()->back()
                        ->with('mensagem','<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i>
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Não foi possível recuperar a sua senha!!</div>');
                }
            }
        }
    }
}