@extends('layouts.index')

@section('content')
<div class="align-center">
    <h3>Código do pedido - {{ $id }}</h3>
    <h6>realizado em: {{ $horarioPedido }}</h6>
    <br>

        <div class="row text-center">
            <div class="col-sm-1">
                <b>Descri&ccedil;&atilde;o</b>
            </div>
            <div class="col-sm-1">
                <b>Quantidade</b>
            </div>
            <div class="col-sm-2">
                <b>Pre&ccedil;o</b>
            </div>
            <div class="col-sm-2">
                <b>Subtotal</b>
            </div>
        </div>
        <br>
        @foreach ($orderedItems as $orderedItem)
        <div class="row text-center">
            <div class="col-sm-1">
                {{ $orderedItem->product->description }}
            </div>
            <div class="col-sm-1">
                {{ $orderedItem->quantity }}
            </div>
            <div class="col-sm-2">
                {{ 'R$ ' . $orderedItem->product->price }}
            </div>
            <div class="col-sm-2">
                {{ 'R$ ' . number_format((float) (str_replace(',', '.', $orderedItem->product->price) * $orderedItem->quantity), 2, ',', '.') }}
            </div>
        </div>
        <br>
        @endforeach
    </div>
    <div class="text-center">
        <h5>Valor total: R$ {{ number_format($valorTotal, 2, ',', '.') }}</h5>
    </div>
@endsection