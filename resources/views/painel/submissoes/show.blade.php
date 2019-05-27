@extends('layoutPainel')

@section('pageHeader')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Submissão </h2>
            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta,
                fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('painel/dashboard') }}"
                                class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('submissoes.index') }}"
                                class="breadcrumb-link">Submissões</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $submissao->titulo }}</li>
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
        <h5 class="card-header text-center">{{ $submissao->tipo }}: {{ $submissao->titulo }}</h5>
        <div class="card-body">

            <div class="row">
                <div class="col-sm-4 text-right"><strong>Tipo:</strong></div>
                <div class="col-sm-8 text-left">{{ $submissao->tipo }}</div>
            </div>

            <div class="row">
                <div class="col-sm-4 text-right"><strong>Título:</strong></div>
                <div class="col-sm-8 text-left">{{ $submissao->titulo }}</div>
            </div>

            <div class="row">
                <div class="col-sm-4 text-right"><strong>Autor (a):</strong></div>
                <div class="col-sm-8 text-left">{{ $submissao->autor }}</div>
            </div>

            <div class="row">
                <div class="col-sm-4 text-right"><strong>Área Temática</strong></div>
                <div class="col-sm-8 text-left">{{ $submissao->area->nome }}</div>
            </div>

            <div class="row">
                <div class="col-sm-4 text-right"><strong>E-mail:</strong></div>
                <div class="col-sm-8 text-left">{{ $submissao->email }}</div>
            </div>

            <div class="row">
                <div class="col-sm-4 text-right"><strong>Telefone:</strong></div>
                <div class="col-sm-8 text-left">{{ $submissao->telefone }}</div>
            </div>

            <div class="row">
                <div class="col-sm-4 text-right"><strong>Lattes:</strong></div>
                <div class="col-sm-8 text-left">{{ $submissao->lattes }}</div>
            </div>

            <div class="row">
                <div class="col-sm-4 text-right"><strong>Instituição:</strong></div>
                <div class="col-sm-8 text-left">{{ $submissao->instituicao }}</div>
            </div>

            <div class="row">
                <div class="col-sm-4 text-right"><strong>Disponibilidade:</strong></div>
                <div class="col-sm-8 text-left">{{ $submissao->disponibilidade }}</div>
            </div>

            <div class="row">
                <div class="col-sm-4 text-right"><strong>Resumo:</strong></div>
                <div class="col-sm-8 text-left">{!! $submissao->resumo !!}</div>
            </div>

            <div class="row">
                <div class="col-sm-4 text-right"><strong>Materiais:</strong></div>
                <div class="col-sm-8 text-left">{!! $submissao->materiais !!}</div>
            </div>

            <div class="row">
                <div class="col-sm-4 text-right"><strong>Data da Submissão:</strong></div>
                <div class="col-sm-8 text-left">{{ date("d/m/Y H:s:i", strtotime($submissao->created_at)) }}</div>
            </div>

        </div>
    </div>
</div>

@endsection