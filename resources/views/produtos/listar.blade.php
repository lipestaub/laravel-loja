@extends('layouts.index')

@section('content')
<div class="align-center">
    <h3>Listar produtos</h3>
    <br>
</div>
<div class="container">
    <div class="row text-center">
        <div class="col-sm-1">
            <strong>Imagem</strong>
        </div>
        <div class="col-sm-1">
            <strong>Descri&ccedil;&atilde;o</strong>
        </div>
        <div class="col-sm-2">
            <strong>Pre&ccedil;o</strong>
        </div>
        <div class="col-sm-1">
            <strong>Op&ccedil;&otilde;es</strong>
        </div>
    </div>
    <br>
    @foreach ($produtos as $produto)
    <div class="row text-center">
        <div class="col-sm-1">
            @if ($produto->image_path == null)
                <img src="{{ asset('defaultProductImage.jpg') }}">
            @else
                <img class="" src="{{ asset($produto->image_path) }}">
            @endif
        </div>
        <div class="col-sm-1">
            {{ $produto->description }}
        </div>
        <div class="col-sm-2">
            {{'R$ ' . $produto->price }}
        </div>
        <div class="col-sm-1">
            <a href="/produtos/formulario/{{ $produto->id }}">Editar</a>
            <a href="/produtos/deletar/{{ $produto->id }}">Deletar</a>
        </div>
    </div>
    <br>
    @endforeach
</div>
@endsection