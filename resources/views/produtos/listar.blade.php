@extends('layouts.index')

@section('content')
    <div class="align-center">
        <h3>Listar produtos</h3>
        <br>
    </div>

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
        <div class="col-sm-3">
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
                    <img  src="{{ asset($produto->image_path) }}">
                @endif
            </div>
            <div class="col-sm-1">
                {{ $produto->description }}
            </div>
            <div class="col-sm-2">
                {{'R$ ' . $produto->price }}
            </div>
            <div class="col-sm-3">
                <div class="d-flex">
                    <a class="btn btn-xs btn-primary" href="/produtos/formulario/{{ $produto->id }}"><i class="fa fa-pencil-square-o"></i> Editar</a>
                    <a class="btn btn-xs btn-danger" href="/produtos/deletar/{{ $produto->id }}"><i class="fa fa-remove"></i> Deletar</a>
                </div>
            </div>
        </div>
        <br>
    @endforeach
@endsection