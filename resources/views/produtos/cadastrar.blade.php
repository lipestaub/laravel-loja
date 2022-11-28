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
<div class="">
    {{ Form::model($produto, ['url' => 'produtos/salvar', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
        <div class="form-group">
            {{ Form::label('description', 'Descrição', ['class' => '']) }}
            <div class="">
                {{ Form::text('description', null, ['class' => ''])}}
            </div>
            <br>
            {{ Form::label('price', 'Preço', ['class' => '']) }}
            <div class="">
                {{ Form::text('price', null, ['class' => ''])}}
            </div>
            <br>
            {{ Form::label('stock', 'Quantidade', ['class' => '']) }}
            <div class="">
                {{ Form::text('stock', null, ['class' => ''])}}
            </div>
            <br>
            {{ Form::label('image_path', 'Imagem', ['class' => '']) }}
            <div class="">
                {{ Form::file('image_path', ['accept' => '.png, .jpg, .jpeg']) }}
            </div>
            <br>
            {{ Form::hidden('id', null) }}
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Salvar</button>
        </div>
    {{ Form::close() }}
</div>
@endsection