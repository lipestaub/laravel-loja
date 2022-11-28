@extends('layouts.index')

@section('content')
<div class="align-center">
    <h3>Meu carrinho</h3>
    <br>

@if (!empty($orderedItems) && !$orderedItems->isEmpty())
    @php
        $valorTotal = $orderedItems['valorTotal'];
        $orderedItems->forget('valorTotal')
    @endphp

    @if ($orderedItems->sum('quantity') == 1)
        <div>1 item no carrinho</div>
    @else
        <div>{{ $orderedItems->sum('quantity') }} itens no carrinho</div>
    @endif

    <br>
    <table>
        <th>Descri&ccedil;&atilde;o</th>
        <th>Quantidade</th>
        <th>Pre&ccedil;o</th>
        <th>Subtotal</th>
        <th>Op&ccedil;&otilde;es</th>
        
        @foreach ($orderedItems as $orderedItem)
        <tr>
            <td>
                {{ $orderedItem->product->description }}
            </td>
            <td>
                {{ $orderedItem->quantity }}
            </td>
            <td>
                {{ 'R$ ' . $orderedItem->product->price }}
            </td>
            <td>
                {{ 'R$ ' . number_format((float) (str_replace(',', '.', $orderedItem->product->price) * $orderedItem->quantity), 2, ',', '.') }}
            </td>
            <td>
                <div class="options">
                    {{ Form::open(['url' => 'carrinho/editar/' . $orderedItem->id, 'method' => 'post']) }}
                        {{ Form::submit('Editar') }}
                    {{ Form::close() }}
                    {{ Form::open(['url' => 'carrinho/deletar/' . $orderedItem->id, 'method' => 'post']) }}
                        {{ Form::submit('Excluir') }}
                    {{ Form::close() }}
                </div>
            </td>
        </tr>
        @endforeach
    </table>
        <br>
    <h4>Valor total: R$ {{ $valorTotal }}</h4>
    {{ Form::open(['url' => 'carrinho/finalizar/' . $orderedItem->order_id, 'method' => 'post']) }}
        {{ Form::submit('Finalizar pedido', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@else
    {{ 'O carrinho está vazio.' }}
@endif
</div>
@endsection