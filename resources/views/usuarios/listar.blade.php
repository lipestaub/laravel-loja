@extends('layouts.index')

@section('content')
<div class="align-center">
    <h3>Listar usuários</h3>
    <br>
</div>
<div class="container">
    <div class="row text-center">
        <div class="col-sm-1">
            <strong>Nome</strong>
        </div>
        <div class="col-sm-1">
            <strong>Tipo</strong>
        </div>
        <div class="col-sm-1">
            <strong>Op&ccedil;&otilde;es</strong>
        </div>
    </div>
    <br>
    @foreach ($usuarios as $usuario)
    <div class="row text-center">
        <div class="col-sm-1">
            {{ $usuario->name }}
        </div>
        <div class="col-sm-1">
            {{ $usuario->user_type }}
        </div>
        <div class="col-sm-1">
            <a href="/usuarios/editar/{{ $usuario->id }}">Editar</a>
            <a href="/usuarios/deletar/{{ $usuario->id }}">Deletar</a>
        </div>
    </div>
    <br>
    @endforeach
</div>
@endsection