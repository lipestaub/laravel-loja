@extends('layouts.index')

@section('content')
<div class="align-center">
    <h3>Editar pedido</h3>
    <br>
</div>
<div class="panel-body">
    {{ Form::model($orderedItem, ['url' => 'carrinho/salvar-edicao', 'method' => 'post']) }}
        <div class="">
            {{ Form::label('description', 'Descrição', ['class' => '']) }}
            <div class="">
            {{ Form::label('productDescription', $orderedItem->product->description, ['class' => '', 'readonly' => 'true'])}}
            </div>
            <br>
            {{ Form::label('price', 'Preço', ['class' => '']) }}
            <div class="">
            {{ Form::label('productPrice', $orderedItem->product->price, ['class' => '', 'readonly' => 'true'])}}
            </div>
            <br>
            {{ Form::label('quantity', 'Quantidade', ['class' => '']) }}
            <div class="">
                {{ Form::number('quantity', null, ['class' => 'form-control', 'min' => 0])}}
            </div>
            <br>
            {{ Form::hidden('id', null) }}
            {{ Form::hidden('product[description]', null) }}
            {{ Form::hidden('product[price]', null) }}
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    {{ Form::close() }}
</div>
@endsection