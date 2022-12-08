@extends('layouts.index')

@section('content')
    <div class="align-center">
        <h3>Meus pedidos</h3>
        <br>
    </div>

    @if ($pedidos)
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-1">
                    <b>Id</b>
                </div>
                <div class="col-sm-2">
                    <b>Quantidade de itens</b>
                </div>
                <div class="col-sm-2">
                    <b>Valor total</b>
                </div>
                <div class="col-sm-1">
                    <b>Op&ccedil;&otilde;es</b>
                </div>
            </div>
            <br>

            @foreach ($pedidos as $pedido)
                <div class="row text-center">
                    <div class="col-sm-1">
                        {{ $pedido['order_id'] }}
                    </div>
                    <div class="col-sm-2">
                        {{ $pedido['quantity'] }}
                    </div>
                    <div class="col-sm-2">
                        {{'R$ ' . $pedido['valorTotal'] }}
                    </div>
                    <div class="col-sm-1">
                        <a class="btn btn-primary" href="/meus-pedidos/detalhar/{{ $pedido['order_id'] }}">Detalhar</a>
                    </div>
                </div>
                <br>
            @endforeach
        </div>
    @else
        <div class="text-center">
            {{ 'Nenhum pedido encontrado.' }}
        </div>
    @endif
@endsection