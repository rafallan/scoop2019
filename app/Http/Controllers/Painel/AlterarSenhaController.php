<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AlterarSenhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('painel.alterarSenha');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'senha_atual' => 'required',
            'nova_senha' => 'required|min:6|confirmed'
        ];

        $messages = [
            'required' => '<span class="text-danger"><i class="fa fa-times-circle-o"></i> Este campo é obrigatório!</span>',
            'min' => '<span class="text-danger"><i class="fa fa-times-circle-o"></i> A senha não pode ter menos de :max caracteres!</span>',
            'confirmed' => '<span class="text-danger"><i class="fa fa-times-circle-o"></i> Os campos senha e confirmação da senha devem ser iguais!</span>',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();

        } else {
            if (Hash::check($request->input('senha_atual'), Auth::user()->password)) {
                $attributes = ['password' => Hash::make($request->input('nova_senha'))];

                $user = User::where('id', Auth::user()->id)->update($attributes);

                if ($user) {
                    return redirect()->back()->with('mensagem', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Senha alterada com sucesso!!</div>');
                } else {
                    return redirect()->back()->with('mensagem', '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i>
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Erro ao tentar alterar a senha!!</div>');
                }
            } else {
                return redirect()->back()->with('mensagem', '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i>
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Senha atual incorreta!!</div>');
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}