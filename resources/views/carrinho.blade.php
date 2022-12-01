@extends('layouts.index')

@section('content')
<div class="align-center">
    <h3>Meu carrinho</h3>
    <br>

@if (!empty($orderedItems) && !$orderedItems->isEmpty())
    @if ($orderedItems->sum('quantity') == 1)
        <div>1 item no carrinho</div>
    @else
        <div>{{ $orderedItems->sum('quantity') }} itens no carrinho</div>
    @endif
    
    <br>
    <div class="container">
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
            <div class="col-sm-1">
                <b>Op&ccedil;&otilde;es</b>
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
            <div class="col-sm-1">
                <div class="d-flex">
                    <a class="btn btn-primary" href="/carrinho/editar/{{ $orderedItem->id }}"><i class="fa fa-pencil-square-o"></i> Editar</a>
                    <a class="btn btn-danger" href="/carrinho/deletar/{{ $orderedItem->id }}"><i class="fa fa-remove"></i> Deletar</a>
                </div>
            </div>
        </div>
        <br>
        @endforeach
    </div>
    <h5>Valor total: R$ {{ $valorTotalCarrinho }}</h5>
    {{ Form::open(['url' => 'carrinho/finalizar/' . $orderedItem->order_id, 'method' => 'post']) }}
        {{ Form::submit('Finalizar pedido', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@else
    {{ 'O carrinho está vazio.' }}
@endif
</div>
@endsection