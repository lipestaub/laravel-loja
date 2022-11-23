@extends('layouts.index')

@section('content')
<h3>Listar usuários</h3>
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
                {{ Form::open(['url' => 'usuarios/editar/' . $usuario->id, 'method' => 'post']) }}
                    {{ Form::submit('Editar') }}
                {{ Form::close() }}
                {{ Form::open(['url' => 'usuarios/deletar/' . $usuario->id, 'method' => 'post']) }}
                    {{ Form::submit('Excluir') }}
                {{ Form::close() }}
            </div>
        </td>
    </tr>
    @endforeach
</table>
@endsection