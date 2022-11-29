@extends('layouts.index')

@section('content')
<div class="align-center">
    <h3>Controle de estoque</h3>
    <br>
</div>

@if (Session::has('alert-error'))
    <div class="align-center">
        <span>Erro: {{ Session::get('alert-error') }}</span>
    </div>
    <br>
@endif
<div class="form-control">
    {{ Form::model($products, ['url' => 'produtos/controle-de-estoque/registrar', 'method' => 'post']) }}
        <div class="form-group">
            {{ Form::label('type', 'Tipo', ['class' => '']) }}
            {{ Form::select('type', array(0 => 'Selecione...', 1 => 'Saída', 2 => 'Entrada'), null, ['class' => 'form-select form-select-sm']) }}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('produto', 'Produto', ['class' => '']) }}
            {{ Form::select('product_id', $products, null, ['class' => 'form-select form-select-sm'])}}
        </div>
        <br>  
        <div class="form-group">
            {{ Form::label('quantity', 'Quantidade', ['class' => '']) }}
            {{ Form::text('quantity', null, ['class' => 'form-control'])}}
        </div>
        <br>
        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Salvar</button>
    {{ Form::close() }}
</div>
@endsection