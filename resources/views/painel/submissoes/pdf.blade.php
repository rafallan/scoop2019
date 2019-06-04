<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Submissão</title>

    <style>
    body {
        font-size: 100%;
        margin: 0;
        padding: 0;
    }

    .center {
        text-align: center;
        font-weight: bold;
    }

    .topo {
        text-align: center;
        margin-top: 0px;
        font-size: 14px;
        font-family: "Liberation Serif";
    }

    .submissao {
        margin: 0cm 2cm 2cm 3cm;
    }

    .submissao .titulo-submissao {
        text-align: left;
        font-size: 14px;
        font-family: "Times New Roman";
        font-weight: bold;
        line-height: 150%;
    }

    .submissao .identificacao_autores {
        text-align: center;
        font-size: 14px;
        text-transform: uppercase;
        font-weight: bold;
    }

    .submissao .conteudo-submissao {
        text-align: justify !important;
        width: 100%;
        font-family: "Times New Roman";
        width: 100%;
    }

    .submissao .page-break {
        page-break-after: auto;
    }

    .rodape {
        position: absolute;
        bottom: 0;
        margin-left: 3cm;
        font-size: 12px;
        position: absolute;
    }

    .rodape .identificacao {
        font-size: 10px;
        text-align: center;
        font-family: "Liberation Serif";
    }
    </style>
</head>

<body>


    <div class="topo">
        <img src="{{ asset('img/mini-logo.png') }}" alt="Logo pequeno"> <br>
        INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DO PARÁ <br>
        CAMPUS SANTARÉM <br>
        SIMPÓSIO DE COMPUTAÇÃO DO OESTE DO PARÁ 2019
    </div>
    <br>

    <h1 class="center">SUBMISSÃO DE TRABALHOS</h1>

    <div class="submissao">

        <p><strong>Tipo: </strong>{{ $submissao->tipo }}</p>

        <p><strong>Título: </strong>{{ $submissao->titulo }}</p>

        <p><strong>Autor (a): </strong> {{ $submissao->autor }}</p>

        <p><strong>Disponibilidade:</strong> {{ $submissao->disponibilidade }}</p>


        <div class="conteudo-submissao page-break">

            <p><strong>Resumo: </strong> {!! $submissao->resumo !!}</p>

        </div>
    </div>

    <div class="rodape">
        <p class="identificacao">
            Scoop 2019 <br>
            Santarém, Pará <br>
            21 a 25 de outubro de 2019
        </p>
    </div>




</body>

</html>