@extends('layouts.index')

@section('content')
<div class="align-center">
    <h3>Minha conta</h3>
    <br>
</div>
<div class="panel-body">
    <label><h5>Nome: </h5></label>
    <label for="nome">{{ $usuario->name }}</label>
    <br>
    <label><h5>E-mail: </h5></label>
    <label for="email">{{ $usuario->email }}</label>
    <br>
    <label><h5>Documento: </h5></label>
    <label for="document">{{ $usuario->document }}</label>
    <br>
    <label><h5>Celular: </h5></label>
    <label for="phone_number">{{ $usuario->phone_number }}</label>
    <br>
    <label><h5>Notificações: </h5></label>
    <label for="notify">{{ $usuario->notify}}</label>
    <br>
    @if ($usuario->notify == 'Sim')
        <label><h5>Chat Id: </h5></label>
        <label for="chat_id">{{ $usuario->chat_id }}</label>
        <br>
    @endif
    <br>
    <div class="text-center">
        <a class="btn btn-primary" href="{{ '/usuario/formulario/' . Auth::user()->id }}"><i class="fa fa-pencil-square-o"></i> Editar</a>
    </div>
</div>
@endsection