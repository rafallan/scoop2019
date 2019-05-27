@extends('layoutSite')

@section('content')

<div class="row">

    <div class="col-sm p-4">
        <h2 class="text-center">SUBMISSÃO DE OFICINAS/MINICURSOS</h2>

        <ol>
            <li>Escolha o tipo de trabalho. Uma oficina terá duração de 4 horas e deverá ser ministrada em apenas um
                turno. O minicurso deverá ter duração de 8 horas, podendo ser ministrado em dias alternados.</li>
            <li>Escolha uma categoria para o seu trabalho</li>
        </ol>

    </div>

    @if(Session::has('mensagem'))
    <div class="col-sm-12 p-2">
        {!! Session::get('mensagem') !!}
    </div>
    @endif

    
    <div class="col-12">
        <form action="{{ route('submissao-oficinas-minicursos.store') }}" method="post" enctype="multipart/form-data">

            @csrf
            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="tipo">Tipo de Trabalho</label>
                    <select name="tipo" id="tipo" class="form-control">
                        <option value="">Selecione o tipo</option>
                        <option value="Oficina" @if(old('tipo')=="Oficina" ) selected @endif>Oficina (4 horas)</option>
                        <option value="Minicurso" @if(old('tipo')=="Minicurso" ) selected @endif>Minicurso (8 horas)
                        </option>
                    </select>
                    <small class="text-danger">{{ $errors->first('tipo') }}</small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="titulo">Título do Trabalho</label>
                    <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Titulo do Trabalho"
                        value="{{ old('titulo') }}">
                    <small class="text-danger">{!! $errors->first('titulo') !!}</small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="autor">Autor (a)</label>
                    <input type="text" name="autor" class="form-control" id="autor" placeholder="Nome do (a) Autor (a)"
                        value="{{ old('autor') }}">
                    <small class="text-danger">{!! $errors->first('autor') !!}</small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="E-mail"
                        value="{{ old('email') }}">
                    <small class="text-danger">{!! $errors->first('email') !!}</small>
                </div>
                <div class="form-group col-sm">
                    <label for="email_confirmation">Confirmação do Email</label>
                    <input type="text" name="email_confirmation" class="form-control" id="email_confirmation"
                        placeholder="Confirme o email" autocomplete="no" onpaste="return false" ondrop="return false"
                        value="{{ old('email_confirmation') }}">
                    <small class="text-danger">{!! $errors->first('email_confirmation') !!}</small>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" class="form-control" id="telefone" placeholder="Telefone"
                        value="{{ old('telefone') }}">
                    <small class="text-danger">{!! $errors->first('telefone') !!}</small>
                </div>
                <div class="form-group col-sm-6">
                    <label for="lattes">Currículo lattes (Link)</label>
                    <input type="text" name="lattes" class="form-control" id="lattes"
                        placeholder="Link do currículo lattes" value="{{ old('lattes') }}">
                    <small class="text-danger">{!! $errors->first('lattes') !!}</small>
                </div>
            </div>

            <div class="form-row div-select">
                <div class="form-group col-sm-6">
                    <label for="area_id">Área temática</label>
                    <select name="area_id" id="area_id" class="form-control">
                        <option value="">Selecione a Área temática</option>
                        @foreach($areas as $area)
                        @if($area->id == old('area_id'))
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
                        placeholder="Instituição de origem" value="{{ old('instituicao') }}">
                    <small class="text-danger">{!! $errors->first('instituicao') !!}</small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label for="disponibilidade">Disponibilidade de dia (s) e turno (s)</label>
                </div>

                @php
                $array = [];
                if(old('dispo')){
                $array = old('dispo');
                }
                @endphp
                @foreach($disponibilidade as $key => $dispo)
                <div class="form-group form-check form-check-inline col-sm">
                    <input name="dispo[]" class="form-check-input" type="checkbox" id="dispo{{ $key }}"
                        value="{{ $dispo }}" @if(in_array($dispo,$array)) checked @endif>
                    <label class="form-check-label" for="dispo{{ $key }}">
                        {{ $dispo }}
                    </label>
                </div>
                @endforeach

                <small class="text-danger">{{ $errors->first('dispo') }}</small>
                <small class="text-muted">Escolha os dias em que estará disponível para realizar o minicurso ou a
                    oficina. As oficinas serão ministradas em 1 (um) turno. Os minicursos serão ministrados em dois
                    turnos, podendo ser em dias alternados.</small>
            </div>
            <br>

            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="resumo">Resumo (até 300 palavras)</label>
                    <textarea name="resumo" id="resumo" class="form-control ckeditor">{{ old('resumo') }}</textarea>
                    <small class="text-danger">{!! $errors->first('resumo') !!}</small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="materiais">Materiais e Softwares necessários</label>
                    <textarea name="materiais" id="materiais"
                        class="form-control ckeditor">{{ old('materiais') }}</textarea>
                    <small class="text-danger">{!! $errors->first('materiais') !!}</small>
                </div>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-success">FAZER SUBMISSÃO</button>
                </div>


            </div>

        </form>
    </div>

</div>

@endsection