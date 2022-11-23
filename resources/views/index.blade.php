@extends('layouts.index')

@section('content')
@if (!empty(Auth::user()))
    <div class="align-right">
        <div>Bem-vindo, {{ Auth::user()->name }}</div>
    </div>
@endif
<div class="align-center">
    <h3>Home</h3>
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
                {{'R$ ' . $produto->price }}
            </td>
            <td>
                <div class="options">
                    {{ Form::open(['url' => 'produtos/comprar/' . $produto->id, 'method' => 'post']) }}
                        {{ Form::submit('Comprar') }}
                    {{ Form::close() }}
                </div>
            </td>
        </tr>
    @endforeach
</table>
@endsection