@extends('layouts.index')

@section('content')
<h3>Listar produtos</h3>
<table>
    <th>Imagem</th>
    <th>Descri&ccedil;&atilde;o</th>
    <th>Pre&ccedil;o</th>
    <th>Op&ccedil;&otilde;es</th>
    
    @foreach ($produtos as $produto)
    <tr>
        <td>
            @if ($produto->image_path == null)
                <img src="{{ asset('defaultProductImage.jpg') }}">
            @else
                <img src="{{ asset($produto->image_path) }}">
            @endif
        </td>
        <td>
            {{ $produto->description }}
        </td>
        <td>
            {{ 'R$ ' . $produto->price }}
        </td>
        <td>
            <div class="options">
                {{ Form::open(['url' => 'produtos/editar/' . $produto->id, 'method' => 'post']) }}
                    {{ Form::submit('Editar') }}
                {{ Form::close() }}
                {{ Form::open(['url' => 'produtos/deletar/' . $produto->id, 'method' => 'post']) }}
                    {{ Form::submit('Excluir') }}
                {{ Form::close() }}
            </div>
        </td>
    </tr>
    @endforeach
</table>
@endsection