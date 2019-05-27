@extends('layoutPainel')

@section('pageHeader')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Áreas Temáticas </h2>
            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta,
                fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('painel/dashboard') }}"
                                class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Áreas Temáticas</li>
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
        <h5 class="card-header">Áreas Temáticas</h5>
        <div class="card-body">
            @if($areas->links())
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    {{ $areas->links() }}
                </ul>
            </nav>
            @endif
            <div class="table-responsive ">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col" colspan="2" class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($areas as $area)
                        <tr>
                            <td>{{ $area->id }}</td>
                            <td>{{ $area->nome }}</td>
                            <td class="text-center"><button class="btn btn-primary btn-xs"><span
                                        class="fa fa-edit"></span></button></td>
                            <td class="text-center"><button class="btn btn-danger btn-xs"><span
                                        class="fa fa-trash"></span></button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                @if($areas->links())
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {{ $areas->links() }}
                    </ul>
                </nav>

                @endif
            </div>
        </div>
    </div>
</div>

@endsection