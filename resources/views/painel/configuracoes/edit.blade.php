@extends('layoutPainel')

@section('pageHeader')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Configurações </h2>
            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta,
                fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Configurações</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

@endsection

@section('conteudo')

<div class="col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Configurações</h5>
        @if(Session::has('mensagem'))
        <div class="col-sm-12 p-2">
            {!! Session::get('mensagem') !!}
        </div>
        @endif
        <div class="card-body">
            {!! Form::open(['role' => 'form', 'method' => 'PUT', 'route' =>
            ['configuracoes.update', $configuracao->id], 'files' => true]) !!}

            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome"
                        value="{{ $configuracao->nome }}" disabled>
                    <small class="text-danger">{!! $errors->first('nome') !!}</small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="data_inicio">Data de Início</label>
                    <input type="text" name="data_inicio" class="form-control" id="data_inicio" placeholder="Data de Início"
                        value="{{ $configuracao->data_inicio }}">
                    <small class="text-danger">{!! $errors->first('data_inicio') !!}</small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="data_fim">Data de Fim</label>
                    <input type="text" name="data_fim" class="form-control" id="data_fim" placeholder="Data de Fim"
                        value="{{ $configuracao->data_fim }}">
                    <small class="text-danger">{!! $errors->first('data_fim') !!}</small>
                </div>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-success">ATUALIZAR DADOS</button>
                </div>


            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection