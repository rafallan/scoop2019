<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $usuarios = User::orderBy('name')->paginate();

        return view('painel.usuarios.index', compact('usuarios'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('painel.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        
        $attributes = [
            'name'              => $request->input('name'),
            'email'            => $request->input('email'),
            'password'             => Hash::make($request->input('senha')),
        ];

        $cadastrado = User::create($attributes);

        if ($cadastrado)
        {
            return redirect(route('usuarios.index'))->with('mensagem', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Cadastro realizado com Sucesso!</div>');
        } else {
            return redirect()->back()->with('mensagem', '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i>
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Erro ao cadastrar!</div>');
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
        $usuario = User::findOrFail($id);

        return view('painel.usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioRequest $request, $id)
    {
        $attributes = [
            'name'              => $request->input('name'),
            'email'            => $request->input('email'),
        ];

        $atualizado = User::where('id', $id)->update($attributes);

        if ($atualizado)
        {
            return redirect(route('usuarios.index'))->with('mensagem', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Cadastro atualizado com Sucesso!</div>');
        } else {
            return redirect()->back()->with('mensagem', '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i>
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Erro ao editar!</div>');
        }
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