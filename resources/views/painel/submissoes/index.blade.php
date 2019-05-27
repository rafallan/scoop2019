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
    @if(Session::has('mensagem'))
    <div class="col-sm-12 p-2">
        {!! Session::get('mensagem') !!}
    </div>
    @endif
    <div class="card">
        <h5 class="card-header">Submissões</h5>
        <div class="card-body">
            @if($submissoes->links())
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    {{ $submissoes->links() }}
                </ul>
            </nav>
            @endif
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Título</th>
                            <th scope="col">Autor (a)</th>
                            <th scope="col">Área Temática</th>
                            <th scope="col" colspan="3" class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($submissoes as $submissao)
                        <tr>
                            <td>{{ $submissao->id }}</td>
                            <td>{{ $submissao->titulo }}</td>
                            <td>{{ $submissao->autor }}</td>
                            <td>{{ $submissao->area->nome }}</td>
                            <td class="text-center">
                                <a href="{{ route('submissoes.show', ['id' => $submissao->id]) }}"
                                    class="btn btn-info btn-xs" title="Visualizar"><span
                                        class="fa fa-search"></span></a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('submissoes.edit', ['id' => $submissao->id]) }}"
                                    class="btn btn-xs btn-primary" title="Editar"><span class="fa fa-edit"></span></a>
                            </td>
                            <td class="text-center"><button class="btn btn-danger btn-xs" title="Excluir"><span
                                        class="fa fa-trash"></span></button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                @if($submissoes->links())
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {{ $submissoes->links() }}
                    </ul>
                </nav>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection