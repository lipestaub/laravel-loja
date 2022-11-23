@extends('layouts.index')

@section('content')
<h3>Editar pedido</h3>
<div class="panel-body">
    {{ Form::model($orderedItem, ['url' => 'carrinho/salvar-edicao', 'method' => 'post']) }}
        <div class="form-group">
            {{ Form::label('description', 'Descrição', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
            {{ Form::label('productDescription', $orderedItem->product->description, ['class' => 'form-control', 'readonly' => 'true'])}}
            </div>
            {{ Form::label('price', 'Preço', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
            {{ Form::label('productPrice', $orderedItem->product->price, ['class' => 'form-control', 'readonly' => 'true'])}}
            </div>
            {{ Form::label('quantity', 'Quantidade', ['class' => 'col-sm-3 control-label']) }}
            <div class="col-sm-6">
                {{ Form::number('quantity', null, ['class' => 'form-control', 'min' => 0])}}
            </div>
            {{ Form::hidden('id', null) }}
            {{ Form::hidden('product[description]', null) }}
            {{ Form::hidden('product[price]', null) }}
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