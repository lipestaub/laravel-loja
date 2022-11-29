@extends('layouts.index')

@section('content')
<div class="align-center">
    <h3>Listar usuários</h3>
    <br>
</div>
<table>
    <th>Nome</th>
    <th>Tipo</th>
    <th>Op&ccedil;&otilde;es</th>
    
    @foreach ($usuarios as $usuario)
    <tr>
        <td>
            {{ $usuario->name }}
        </td>
        <td>
            {{ $usuario->user_type }}
        </td>
        <td>
            <div class="options">
                <a href="/usuarios/editar/{{ $usuario->id }}">Editar</a>
                <a href="/usuarios/deletar/{{ $usuario->id }}">Deletar</a>
            </div>
        </td>
    </tr>
    @endforeach
</table>
@endsection