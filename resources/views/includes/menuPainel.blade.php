<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="{{ route('dashboard') }}">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    @if(Request::is('scoop2019/painel/dashboard'))
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard') }}"><i
                                class="fas fa-fw fa-home"></i>Dashboard <span
                                class="badge badge-success">6</span></a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}"><i
                                class="fas fa-fw fa-home"></i>Dashboard <span
                                class="badge badge-success">6</span></a>
                    </li>
                    @endif

                    @if(Request::is('scoop2019/painel/areas-tematicas'))
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('areas-tematicas.index') }}"><i
                                class="fa fa-fw fa-rocket"></i>Áreas Temáticas</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('areas-tematicas.index') }}"><i
                                class="fa fa-fw fa-rocket"></i>Áreas Temáticas</a>
                    </li>
                    @endif

                    @if(Request::is('scoop2019/painel/submissoes'))
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('submissoes.index') }}"><i
                                class="fas fa-fw fa-chart-pie"></i>Submissões</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('submissoes.index') }}"><i
                                class="fas fa-fw fa-chart-pie"></i>Submissões</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href=""><i class="fas fa-fw fa-users"></i>Voluntários</a>
                    </li>

                    @if(Request::is('scoop2019/painel/usuarios'))
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('usuarios.index') }}"><i class="fa fa-fw fa-user"></i>Usuários</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('usuarios.index') }}"><i class="fa fa-fw fa-user"></i>Usuários</a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>