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
<div class="panel-body">
    {{ Form::model($products, ['url' => 'produtos/controle-de-estoque/registrar', 'method' => 'post']) }}
        <div class="form-group">
            {{ Form::label('type', 'Tipo', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::select('type', array(0 => 'Selecione...', 1 => 'Saída', 2 => 'Entrada'), null) }}
            </div>
            <br>
            {{ Form::label('produto', 'Produto', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::select('product_id', $products)}}
            </div>
            <br>
            {{ Form::label('quantity', 'Quantidade', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::text('quantity', null, ['class' => 'form-control'])}}
            </div>
            <br>
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