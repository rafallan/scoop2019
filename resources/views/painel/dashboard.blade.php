@extends('layoutPainel')

@section('pageHeader')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Dashboard </h2>
            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta,
                fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                class="breadcrumb-link">Dashboard</a></li>

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

@endsection

@section('conteudo')


<div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Total Áreas Temáticas</h5>
            <div class="card-body">
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{ $areas->count() }}</h1>
                </div>
                <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                    
                </div>
            </div>
            <div class="card-body bg-light p-t-40 p-b-40">
                <div id="sparkline-revenue"></div>
            </div>
            <div class="card-footer text-center bg-white">
                <a href="{{ route('areas-tematicas.index') }}" class="card-link">Visualizar</a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Total Submissões</h5>
            <div class="card-body">
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{ $submissoes->count() }}</h1>
                </div>
                <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                    
                </div>
            </div>
            <div class="card-body text-center bg-light p-t-40 p-b-40">
                <div id="sparkline-revenue2"></div>
            </div>
            <div class="card-footer text-center bg-white">
                <a href="{{ route('submissoes.index') }}" class="card-link">Visualizar</a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Total Voluntários</h5>
            <div class="card-body">
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1">0</h1>
                </div>
                <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                    
                </div>
            </div>
            <div class="card-body bg-light p-t-40 p-b-40">
                <div id="sparkline-revenue3"></div>
            </div>
            <div class="card-footer text-center bg-white">
                <a href="#" class="card-link">View Details</a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Total Usuários</h5>
            <div class="card-body">
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{ $usuarios->count() }}</h1>
                </div>
                <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                    
                </div>
            </div>
            <div class="card-body bg-light p-b-40 p-t-40">
                <div id="sparkline-revenue4"></div>
            </div>
            <div class="card-footer text-center bg-white">
                <a href="{{ route('usuarios.index') }}" class="card-link">Visualizar</a>
            </div>
        </div>
    </div>
</div>



@endsection