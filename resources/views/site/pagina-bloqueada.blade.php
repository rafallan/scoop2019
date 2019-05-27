@extends('layoutSite')

@section('content')

<div class="row">
    <div class="col">
        <h1 class="text-center">{{ $title }}</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        @if($button)
        {{ $button }}
        @endif
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="alert alert-warning" role="alert">
            <h3 class="text-center text-danger">{{ $mensagem }}</h3>
        </div>
    </div>
</div>
@stop