<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.login');
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
            'usuario' => 'required|email',
            'senha' => 'required',
        ];

        $messages = [
            'required' => '<span class="text-danger"><i class="fa fa-times-circle-o"></i> Este campo é obrigatório</span>',
            'email' => '<span class="text-danger"><i class="fa fa-times-circle-o"></i> Digite um e-mail válido</span>',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();

        } else {

            $usuario = $request->input('usuario');
            $senha = $request->input('senha');

            if (Auth::attempt(['email' => $usuario, 'password' => $senha])) {

                    return redirect()->route('dashboard');

            } else {

                return redirect()->back()
                    ->with('mensagem', '<div class="alert alert-danger alert-dismissable"><i class="fa fa-check"></i>
                                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Usuário ou senha inválidos!!</div>');
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
    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}