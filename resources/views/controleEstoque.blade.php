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
<div class="">
    {{ Form::model($products, ['url' => 'produtos/controle-de-estoque/registrar', 'method' => 'post']) }}
        <div class="form-group">
            {{ Form::label('type', 'Tipo', ['class' => '']) }}
            <div class="">
                {{ Form::select('type', array(0 => 'Selecione...', 1 => 'Saída', 2 => 'Entrada'), null) }}
            </div>
            <br>
            {{ Form::label('produto', 'Produto', ['class' => '']) }}
            <div class="">
                {{ Form::select('product_id', $products)}}
            </div>
            <br>
            {{ Form::label('quantity', 'Quantidade', ['class' => '']) }}
            <div class="">
                {{ Form::text('quantity', null, ['class' => ''])}}
            </div>
            <br>
        </div>

        <div class="">
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Salvar</button>
        </div>
    {{ Form::close() }}
</div>
@endsection