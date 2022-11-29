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
    {{ Form::label('search', 'O que você procura?') }}
    <div class="d-flex flex-row">
        {{ Form::text('search', null, ['class' => 'form-control'])}}
        {{ Form::submit('Buscar', ['class' => 'btn btn-primary']) }}
    </div>
{{ Form::close() }}

<br>

@if (!empty($produtos))
    @if (!$produtos->isEmpty())
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-1">
                    <strong>Imagem</strong>
                </div>
                <div class="col-sm-1">
                    <strong>Descri&ccedil;&atilde;o</strong>
                </div>
                <div class="col-sm-2">
                    <strong>Pre&ccedil;o</strong>
                </div>
                <div class="col-sm-1">
                    <strong>Op&ccedil;&otilde;es</strong>
                </div>
            </div>
            <br>
            @foreach ($produtos as $produto)
            <div class="row text-center">
                <div class="col-sm-1">
                    @if ($produto->image_path == null)
                        <img src="{{ asset('defaultProductImage.jpg') }}">
                    @else
                        <img src="{{ asset($produto->image_path) }}">
                    @endif
                </div>
                <div class="col-sm-1">
                    {{ $produto->description }}
                </div>
                <div class="col-sm-2">
                    {{'R$ ' . $produto->price }}
                </div>
                <div class="col-sm-1">
                    <a href="/produtos/comprar/{{ $produto->id }}">Comprar</a>
                </div>
            </div>
            <br>
            @endforeach
        </div>
    @else
        <div>Nenhum produto encontrado.</div>     
    @endif
@endif

@endsection