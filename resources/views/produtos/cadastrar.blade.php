@extends('layouts.index')

@section('content')
<div class="align-center">
    @if (isset($title) && $title != null)
        <h3>{{ $title }}</h3>
    @else
        <h3>Cadastrar produtos</h3>
    @endif
    <br>
</div>
@if (Session::has('warning'))
    <div class="card text-bg-warning mb-3">
        <div class="card-header">Aviso</div>
        <div class="card-body">
            <span class="card-text">{{ Session::get('warning') }}</span>
        </div>
    </div>
    <br>
@endif
<div>
    {{ Form::model($produto, ['url' => 'produtos/salvar', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
        <div class="form-group">
            <b>{{ Form::label('description', 'Descrição') }}</b>
            <div>
                {{ Form::text('description', null, ['class' => 'form-control'])}}
            </div>
            <br>
            <b>{{ Form::label('price', 'Preço') }}</b>
            <div>
                @if ($produto->price == 0)
                    {{ Form::text('price', '', ['class' => 'form-control'])}}
                @else
                {{ Form::text('price', null, ['class' => 'form-control'])}}
                @endif
                
            </div>
            <br>
            <b>{{ Form::label('stock', 'Quantidade') }}</b>
            <div>
                {{ Form::text('stock', null, ['class' => 'form-control'])}}
            </div>
            <br>
            <b>{{ Form::label('image_path', 'Imagem') }}</b>
            <div>
                {{ Form::file('image_path', ['accept' => '.png, .jpg, .jpeg', 'class' => 'form-control form-control-file']) }}
            </div>
            <br>
            {{ Form::hidden('id', null) }}
        </div> 
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    {{ Form::close() }}
</div>
@endsection