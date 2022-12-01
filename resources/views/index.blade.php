@extends('layouts.index')

@section('content')
<div class="align-center">
    <h3>Home</h3>
    <br>
</div>
<div class="container">
    <div class="row text-center">
        <div class="col-sm-1">
            <b>Imagem</b>
        </div>
        <div class="col-sm-1">
            <b>Descri&ccedil;&atilde;o</b>
        </div>
        <div class="col-sm-2">
            <b>Pre&ccedil;o</b>
        </div>
        <div class="col-sm-1">
            <b>Op&ccedil;&otilde;es</b>
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
            <a class="btn btn-primary" href="/produtos/comprar/{{ $produto->id }}">Comprar</a>
        </div>
    </div>
    <br>
    @endforeach
</div>
@endsection