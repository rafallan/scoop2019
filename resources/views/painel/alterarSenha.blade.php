@extends('layoutPainel')

@section('pageHeader')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Alterar Senha </h2>
            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta,
                fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Alterar Senha</li>
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
        <h5 class="card-header">Alterar Senha</h5>
        @if(Session::has('mensagem'))
        <div class="col-sm-12 p-2">
            {!! Session::get('mensagem') !!}
        </div>
        @endif
        <div class="card-body">
            {!! Form::open(["role" => "form", "method" => "POST", "route" => "alterar-senha.store"]) !!}

                    <div class="box-body">

                        <div class="form-group">
                            {!! Form::label('Senha Atual') !!}
                            {!! Form::Password('senha_atual',['class' => 'form-control']) !!}
                            {!! $errors->first('senha_atual') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Nova Senha') !!}
                            {!! Form::password('nova_senha',['class' => 'form-control']) !!}
                            {!! $errors->first('nova_senha') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Confirmação da Nova Senha') !!}
                            {!! Form::password('nova_senha_confirmation',['class' => 'form-control']) !!}
                            {!! $errors->first('nova_senha_confirmation') !!}
                        </div>
                    </div>
                    <div class="box-footer">
                        {!! Form::submit("Alterar Senha",['class' => 'btn btn-success']) !!}
                    </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection