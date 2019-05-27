<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <a class="navbar-brand d-block d-sm-none" href="#">SCOOP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <span class="nav-link" href="https://scoop.net.br/">Início <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="https://scoop.net.br/apresentacao/" id="navbarDropdown"
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Apresentação
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="https://scoop.net.br/organizacao/">Organização</a>
                    <a class="dropdown-item" href="https://scoop.net.br/locais/">Locais</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://scoop.net.br/programacao/">Programação</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="https://scoop.net.br/apresentacao/" id="navbarDropdown"
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Chamadas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="https://scoop.net.br/chamadas-de-trabalhos/">Trabalhos
                        Científicos</a>
                    <a class="dropdown-item" href="{{ route('submissao-oficinas-minicursos.index') }}">Minicursos e
                        Oficinas</a>
                    <a class="dropdown-item" href="https://scoop.net.br/organizacao/">Voluntários</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="https://scoop.net.br/inscricoes/">Inscrições</a>
            </li>

        </ul>
    </div>
</nav>