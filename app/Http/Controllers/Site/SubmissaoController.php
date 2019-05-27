<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubmissaoRequest;
use App\Models\AreaTematica;
use App\Models\Submissao;

class SubmissaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dataInicio = '2019-06-01 08:00:00'; // 01 de julho de 2018 às 08:00:00
        $dataFim    = '2019-08-31 23:59:00'; // 10 de julho de 2018 às 23:59:00

        if($dataInicio <= date("Y-m-d H:i:s") && $dataFim >= date("Y-m-d H:i:s")){

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

            $data = [
                'titlePage'        => "Submissão de Oficinas/Minicursos",
                'disponibilidade'  => $disponibilidade,
                'areas'            => $areas,
            ];

            return view('site.submissao-minicursos-oficinas')->with($data);

        } else if($dataInicio >= date("Y-m-d H:i:s") && $dataFim > date("Y-m-d H:i:s")){

            $data = [
                'titlePage' => "Submissão de Oficinas/Minicursos",
                'mensagem' => "As inscrições ocorrerão no período de 27/05 a 10/07 de 2019",
                'button' => null,
                'title' => "Submissão de Oficinas/Minicursos",
            ];

            return view("site.pagina-bloqueada")->with($data);

        } else if($dataInicio < date("Y-m-d H:i:s") && $dataFim < date("Y-m-d H:i:s")){
            
            $data = [
                'mensagem' => "Submissões Encerradas.",
                'title' => "Submissão de Oficinas/Minicursos",
                'button' => null,
            ];

            return view("site.pagina-bloqueada")->with($data);
        }
        
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
    public function store(SubmissaoRequest $request)
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
            'disponibilidade'   => @implode('|', $request->input('dispo')),
            'resumo'            => $request->input('resumo'),
            'materiais'         => $request->input('materiais')
        ];

        $cadastrado = Submissao::create($attributes);

        if ($cadastrado)
        {

            
            return redirect(route('submissao-oficinas-minicursos.index'))->with('mensagem', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
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