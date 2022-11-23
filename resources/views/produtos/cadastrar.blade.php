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
<div class="panel-body">
    {{ Form::model($produto, ['url' => 'produtos/salvar', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
        <div class="form-group">
            {{ Form::label('description', 'Descrição', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('description', null, ['class' => 'form-control'])}}
            </div>
            <br>
            {{ Form::label('price', 'Preço', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('price', null, ['class' => 'form-control'])}}
            </div>
            <br>
            {{ Form::label('stock', 'Quantidade', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('stock', null, ['class' => 'form-control'])}}
            </div>
            <br>
            {{ Form::label('image_path', 'Imagem', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::file('image_path', ['accept' => '.png, .jpg, .jpeg']) }}
            </div>
            <br>
            {{ Form::hidden('id', null) }}
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Salvar
                </button>
            </div>
        </div>
    {{ Form::close() }}
</div>
@endsection