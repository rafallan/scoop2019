<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Submissao;
use App\Models\AreaTematica;
use App\Http\Requests\SubmissaoRequest;
use PDF;

class SubmissoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $q = $request->q;

        if (isset($q)) {
           
            $submissoes = Submissao::select(
                'submissoes.id as id',
                'submissoes.titulo as titulo',
                'submissoes.autor as autor',
                'areas_tematicas.nome as area'
            )            
            ->join('areas_tematicas', 'submissoes.area_id', 'areas_tematicas.id')
                    ->where('submissoes.titulo', 'like', '%' . $q . '%')
                    ->orWhere('submissoes.autor', 'like', '%' . $q . '%')
                    ->orWhere('areas_tematicas.nome', 'like', '%' . $q . '%')
                    ->orderBy('submissoes.titulo', 'asc')
                    ->paginate(50);

        } else {
            $submissoes = Submissao::select(
                'submissoes.id as id',
                'submissoes.titulo as titulo',
                'submissoes.autor as autor',
                'areas_tematicas.nome as area'
                )
                ->join('areas_tematicas', 'submissoes.area_id', 'areas_tematicas.id')
                ->orderBy('submissoes.titulo')
                ->paginate(50);
        }

        return view('painel.submissoes.index', compact('submissoes'));

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $submissao = Submissao::find($id);

        return view('painel.submissoes.show', compact('submissao'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $submissao = Submissao::findOrFail($id);

        $areas = AreaTematica::orderBy('nome')->get();

        $disponibilidade = [
            0    => '21/10 - Matutino',
            1    => '21/10 - Vespertino',
            2    => '22/10 - Matutino',
            3    => '22/10 - Vespertino',
            4    => '22/10 - Noturno',
            5    => '23/10 - Matutino',
            6    => '23/10 - Vespertino',
            7    => '23/10 - Noturno',
            8    => '25/10 - Matutino',
            9    => '25/10 - Vespertino', 
        ];

        return view('painel.submissoes.edit', compact('submissao', 'areas', 'disponibilidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubmissaoRequest $request, $id)
    {

        $attributes = [
            'tipo'              => $request->input('tipo'),
            'titulo'            => $request->input('titulo'),
            'autor'             => $request->input('autor'),
            'email'             => $request->input('email'),
            'telefone'          => $request->input('telefone'),
            'lattes'            => $request->input('lattes'),
            'area_id'           => $request->input('area_id'),
            'instituicao'       => $request->input('instituicao'),
            'disponibilidade'   => @implode('|', $request->input('disponibilidade')),
            'resumo'            => $request->input('resumo'),
            'materiais'         => $request->input('materiais')
        ];

        $atualizado = Submissao::where('id', $id)->update($attributes);

        if ($atualizado)
        {
            return redirect(route('submissoes.index'))->with('mensagem', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
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

    public function pdf($id){
        
        $submissao = Submissao::findOrFail($id);

        $pdf = PDF::loadView('painel.submissoes.pdf', ['submissao' => $submissao])->setPaper('a4', 'portrait')->setWarnings(false);

        return $pdf->download('submissao.pdf');

        return view('painel.submissoes.pdf',['submissao' => $submissao]);


    }
}