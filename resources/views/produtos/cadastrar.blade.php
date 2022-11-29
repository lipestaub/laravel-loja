@extends('layouts.index')

@section('content')
<div class="align-center">
    <h3>Cadastrar produtos</h3>
    <br>
</div>
@if (Session::has('alert-error'))
    <div class="align-center">
        <span>Erro: {{ Session::get('alert-error') }}</span>
    </div>
    <br>
@endif
<div>
    {{ Form::model($produto, ['url' => 'produtos/salvar', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
        <div class="form-group">
            {{ Form::label('description', 'Descrição') }}
            <div>
                {{ Form::text('description', null, ['class' => 'form-control'])}}
            </div>
            <br>
            {{ Form::label('price', 'Preço') }}
            <div>
                {{ Form::text('price', null, ['class' => 'form-control'])}}
            </div>
            <br>
            {{ Form::label('stock', 'Quantidade') }}
            <div>
                {{ Form::text('stock', null, ['class' => 'form-control'])}}
            </div>
            <br>
            {{ Form::label('image_path', 'Imagem') }}
            <div>
                {{ Form::file('image_path', ['accept' => '.png, .jpg, .jpeg', 'class' => 'form-control form-control-file']) }}
            </div>
            <br>
            {{ Form::hidden('id', null) }}
        </div> 
        <div class="text-center">
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Salvar</button>
        </div>
    {{ Form::close() }}
</div>
@endsection