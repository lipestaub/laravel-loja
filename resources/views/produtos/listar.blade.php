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
                <img  src="{{ asset($produto->image_path) }}">
            @endif
        </div>
        <div class="col-sm-1">
            {{ $produto->description }}
        </div>
        <div class="col-sm-2">
            {{'R$ ' . $produto->price }}
        </div>
        <div class="col-sm-1">
            <div class="d-flex">
                <a class="btn btn-primary" href="/produtos/editar/{{ $produto->id }}"><i class="fa fa-pencil-square-o"></i> Editar</a>
                <a class="btn btn-danger" href="/produtos/deletar/{{ $produto->id }}"><i class="fa fa-remove"></i> Deletar</a>
            </div>
        </div>
    </div>
    <br>
    @endforeach
</div>
@endsection