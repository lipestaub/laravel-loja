@extends ('layouts.index')

@section('content')
<div class="align-center">
    <h3>Buscar produtos</h3>
    <br>
</div>

@if (Session::has('alert-error'))
    <div class="align-center">
        <span>Erro: {{ Session::get('alert-error') }}</span>
    </div>
    <br>
@endif

{{ Form::open(['url' => 'produtos/buscar/resultados', 'method' => 'post']) }}
    {{ Form::label('search', 'O que você procura?', ['class' => '']) }}
    <div class="">
        {{ Form::text('search', null, ['class' => ''])}}
    {{ Form::submit('Buscar', ['class' => 'btn btn-primary']) }}
    </div>
{{ Form::close() }}

<br>

@if (!empty($produtos))
    @if (!$produtos->isEmpty())
        <table>
            <th>Descri&ccedil;&atilde;o</th>
            <th>Pre&ccedil;o</th>
            <th>Op&ccedil;&otilde;es</th>
        
            @foreach ($produtos as $produto)
                <tr>
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
    @else
        <div>Nenhum produto encontrado.</div>     
    @endif
@endif

@endsection