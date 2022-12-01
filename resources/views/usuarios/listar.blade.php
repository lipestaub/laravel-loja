@extends('layouts.index')

@section('content')
<div class="align-center">
    <h3>Listar usuários</h3>
    <br>
</div>
<div class="container">
    <div class="row text-center">
        <div class="col-sm-1">
            <b>Nome</b>
        </div>
        <div class="col-sm-1">
            <b>Tipo</b>
        </div>
        <div class="col-sm-1">
            <b>Op&ccedil;&otilde;es</b>
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
            <div class="d-flex">
                <a class="btn btn-primary" href="/usuarios/editar/{{ $usuario->id }}"><i class="fa fa-pencil-square-o"></i> Editar</a>
                <a class="btn btn-danger" href="/usuarios/deletar/{{ $usuario->id }}"><i class="fa fa-remove"></i> Deletar</a>
            </div>
        </div>
    </div>
    <br>
    @endforeach
</div>
@endsection