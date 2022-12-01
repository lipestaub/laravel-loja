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
<div>
    {{ Form::model($products, ['url' => 'produtos/controle-de-estoque/registrar', 'method' => 'post']) }}
        <div class="form-group">
            <b>{{ Form::label('type', 'Tipo') }}</b>
            {{ Form::select('type', array(0 => 'Selecione...', 1 => 'Saída', 2 => 'Entrada'), null, ['class' => 'form-select form-select-sm']) }}
        </div>
        <br>
        <div class="form-group">
            <b>{{ Form::label('produto', 'Produto') }}</b>
            {{ Form::select('product_id', $products, null, ['class' => 'form-select form-select-sm'])}}
        </div>
        <br>  
        <div class="form-group">
            <b>{{ Form::label('quantity', 'Quantidade') }}</b>
            {{ Form::text('quantity', null, ['class' => 'form-control'])}}
        </div>
        <br>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    {{ Form::close() }}
</div>
@endsection