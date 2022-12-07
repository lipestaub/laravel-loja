<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order;
use App\OrderedItem;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    public function listar()
    {
        $orderIds = [];

        $orders = Order::whereUserId(Auth::user()->id)->get()->flatten();

        foreach ($orders as $order) {
            array_push($orderIds, $order->id);
        }

        $pedidos = [];

        foreach ($orderIds as $orderId) {
            $pedido = OrderedItem::with('product')->whereOrderId($orderId)->get();
            array_push($pedidos, $pedido);
        }

        $pedidosCliente = [];

        foreach ($pedidos as $pedido) {
            $valorTotal = 0;
            $totalItens = 0;

            foreach ($pedido as $orderedItem) {
                $price = (float) str_replace(',', '.', $orderedItem->product->price);
                $quantity = (float) $orderedItem->quantity;
                
                $totalItens += $quantity;
                $valorTotal += $price * $quantity;

                $b['order_id'] = $orderedItem->order_id;
            }

            $b['quantity'] = $orderedItem->quantity;
            $b['valorTotal'] = $valorTotal;
            array_push($pedidosCliente, $b);
        }

        $view = ['pedidos' => $pedidosCliente];

        return view('pedidos.listar', $view);
    }
}
