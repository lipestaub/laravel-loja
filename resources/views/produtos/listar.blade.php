@extends('layouts.index')

@section('content')
<div class="align-center">
    <h3>Listar produtos</h3>
    <br>
</div>
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
                <a href="/produtos/formulario/{{ $produto->id }}">Editar</a>
                <a href="/produtos/deletar/{{ $produto->id }}">Deletar</a>
            </div>
        </td>
    </tr>
    @endforeach
</table>
@endsection