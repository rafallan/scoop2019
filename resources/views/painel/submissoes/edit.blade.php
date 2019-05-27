@extends('layoutPainel')

@section('pageHeader')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Submissões </h2>
            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta,
                fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('painel/dashboard') }}"
                                class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Submissões</li>
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
        <h5 class="card-header">Submissões</h5>
        @if(Session::has('mensagem'))
        <div class="col-sm-12 p-2">
            {!! Session::get('mensagem') !!}
        </div>
        @endif
        <div class="card-body">
            {!! Form::open(['role' => 'form', 'method' => 'PUT', 'route' =>
            ['submissoes.update', $submissao->id], 'files' => true]) !!}

            @csrf
            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="tipo">Tipo de Trabalho</label>
                    <select name="tipo" id="tipo" class="form-control">
                        <option value="">Selecione o tipo</option>
                        <option value="Oficina" @if($submissao->tipo == "Oficina") selected @endif>Oficina (4 horas)
                        </option>
                        <option value="Minicurso" @if($submissao->tipo == "Minicurso" ) selected @endif>Minicurso (8
                            horas)
                        </option>
                    </select>
                    <small class="text-danger">{{ $errors->first('tipo') }}</small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="titulo">Título do Trabalho</label>
                    <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Titulo do Trabalho"
                        value="{{ $submissao->titulo }}">
                    <small class="text-danger">{!! $errors->first('titulo') !!}</small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="autor">Autor (a)</label>
                    <input type="text" name="autor" class="form-control" id="autor" placeholder="Nome do (a) Autor (a)"
                        value="{{ $submissao->autor }}">
                    <small class="text-danger">{!! $errors->first('autor') !!}</small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="E-mail"
                        value="{{ $submissao->email }}">
                    <small class="text-danger">{!! $errors->first('email') !!}</small>
                </div>
                <div class="form-group col-sm">
                    <label for="email_confirmation">Confirmação do Email</label>
                    <input type="text" name="email_confirmation" class="form-control" id="email_confirmation"
                        placeholder="Confirme o email" autocomplete="no" onpaste="return false" ondrop="return false"
                        value="{{ $submissao->email }}">
                    <small class="text-danger">{!! $errors->first('email_confirmation') !!}</small>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" class="form-control" id="telefone" placeholder="Telefone"
                        value="{{ $submissao->telefone }}">
                    <small class="text-danger">{!! $errors->first('telefone') !!}</small>
                </div>
                <div class="form-group col-sm-6">
                    <label for="lattes">Currículo lattes (Link)</label>
                    <input type="text" name="lattes" class="form-control" id="lattes"
                        placeholder="Link do currículo lattes" value="{{ $submissao->lattes }}">
                    <small class="text-danger">{!! $errors->first('lattes') !!}</small>
                </div>
            </div>

            <div class="form-row div-select">
                <div class="form-group col-sm-6">
                    <label for="area_id">Área temática</label>
                    <select name="area_id" id="area_id" class="form-control">
                        <option value="">Selecione a Área temática</option>
                        @foreach($areas as $area)
                        @if($area->id == $submissao->area_id)
                        <option value="{{ $area->id }}" selected>{{ $area->nome }}</option>
                        @else
                        <option value="{{ $area->id }}">{{ $area->nome }}</option>
                        @endif
                        @endforeach
                    </select>
                    <small class="text-danger">{{ $errors->first('area_id') }}</small>
                </div>
                <div class="form-group col-sm-6">
                    <label for="instituicao">Instituição de Origem</label>
                    <input type="text" name="instituicao" class="form-control" id="instituicao"
                        placeholder="Instituição de origem" value="{{ $submissao->instituicao }}">
                    <small class="text-danger">{!! $errors->first('instituicao') !!}</small>
                </div>
            </div>

            <div class="form-group">

                {!! Form::label('disponibilidade', 'Disponibilidade de turno (s) e dia (s)*') !!} <br>

                <label class="checkbox-inline">
                    {!! Form::checkbox('disponibilidade[]', '21/10 - Matutino',
                    ($submissao->disponibilidade('21/10 - Matutino')),['class' => 'checkbox-inline']) !!}
                    21/10 - Matutino
                </label>

                <label class="checkbox-inline">
                    {!! Form::checkbox('disponibilidade[]', '21/10 - Vespertino', (
                    $submissao->disponibilidade('21/10 - Vespertino')),['class' => 'checkbox-inline']) !!}
                    21/10 - Vespertino
                </label>

                <label class="checkbox-inline">
                    {!! Form::checkbox('disponibilidade[]', '22/10 - Matutino', (
                    $submissao->disponibilidade('22/10 - Matutino')),['class' => 'checkbox-inline']) !!}
                    22/10 - Matutino
                </label>

                <label class="checkbox-inline">
                    {!! Form::checkbox('disponibilidade[]', '22/10 - Vespertino', (
                    $submissao->disponibilidade('22/10 - Vespertino')),['class' => 'checkbox-inline']) !!}
                    22/10 - Vespertino
                </label>

                <label class="checkbox-inline">
                    {!! Form::checkbox('disponibilidade[]', '22/10 - Noturno', (
                    $submissao->disponibilidade('22/10 - Noturno')),['class' => 'checkbox-inline']) !!}
                    22/10 - Noturno
                </label>

                <label class="checkbox-inline">
                    {!! Form::checkbox('disponibilidade[]', '23/10 - Matutino', (
                    $submissao->disponibilidade('23/10 - Matutino')),['class' => 'checkbox-inline']) !!}
                    23/10 - Matutino
                </label>

                <label class="checkbox-inline">
                    {!! Form::checkbox('disponibilidade[]', '23/10 - Vespertino', (
                    $submissao->disponibilidade('23/10 - Vespertino')),['class' => 'checkbox-inline']) !!}
                    23/10 - Vespertino
                </label>

                <label class="checkbox-inline">
                    {!! Form::checkbox('disponibilidade[]', '23/10 - Noturno', (
                    $submissao->disponibilidade('23/10 - Noturno')),['class' => 'checkbox-inline']) !!}
                    23/10 - Noturno
                </label>

                <label class="checkbox-inline">
                    {!! Form::checkbox('disponibilidade[]', '25/10 - Matutino', (
                    $submissao->disponibilidade('25/10 - Matutino')),['class' => 'checkbox-inline']) !!}
                    25/10 - Matutino
                </label>

                <label class="checkbox-inline">
                    {!! Form::checkbox('disponibilidade[]', '25/10 - Vespertino', (
                    $submissao->disponibilidade('25/10 - Vespertino')),['class' => 'checkbox-inline']) !!}
                    25/10 - Vespertino
                </label>
                <br>

                <small class="text-danger">{!! $errors->first('disponibilidade') !!}</small>

            </div>

            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="resumo">Resumo (até 300 palavras)</label>
                    <textarea name="resumo" id="resumo"
                        class="form-control ckeditor">{!! $submissao->resumo !!}</textarea>
                    <small class="text-danger">{!! $errors->first('resumo') !!}</small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="materiais">Materiais e Softwares necessários</label>
                    <textarea name="materiais" id="materiais"
                        class="form-control ckeditor">{!! $submissao->materiais !!}</textarea>
                    <small class="text-danger">{!! $errors->first('materiais') !!}</small>
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