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

        $orders = Order::where(['user_id' => Auth::user()->id, 'status' => 1])->get();

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
            $dataPedido = Order::whereId($pedido[0]->order_id)->get()[0]->updated_at->format('d/m/Y');
            $valorTotal = 0;
            $totalItens = 0;

            foreach ($pedido as $orderedItem) {
                $price = (float) str_replace(',', '.', $orderedItem->product->price);
                $quantity = (float) $orderedItem->quantity;
                
                $totalItens += $quantity;
                $valorTotal += $price * $quantity;

                $itemPedido['order_id'] = $orderedItem->order_id;
            }

            $itemPedido['quantity'] = $totalItens;
            $itemPedido['valorTotal'] = $valorTotal;
            $itemPedido['data'] = $dataPedido;
            array_push($pedidosCliente, $itemPedido);
        }

        $view = ['pedidos' => $pedidosCliente, 'total'];

        return view('pedidos.listar', $view);
    }

    public function detalhar($id)
    {
        $dataPedido = Order::whereId($id)->get()[0]->updated_at->format('d/m/Y');
        $horaPedido = Order::whereId($id)->get()[0]->updated_at->format('H') - 3;
        $minutoPedido = Order::whereId($id)->get()[0]->updated_at->format('i');
        $horarioPedido = $dataPedido . ' - ' . $horaPedido . ':' . $minutoPedido;

        $orderedItems = OrderedItem::with('product')->whereOrderId($id)->get();

        $totalItens = 0;
        $valorTotal = 0;

        foreach ($orderedItems as $orderedItem) {
            $price = (float) str_replace(',', '.', $orderedItem->product->price);
                $quantity = (float) $orderedItem->quantity;
                
                $valorTotal += $price * $quantity;
        }

        $view = ['id' => $id, 'orderedItems' => $orderedItems, 'horarioPedido' => $horarioPedido, 'valorTotal' => $valorTotal];
    
        return view('pedidos.detalhar', $view);
    }
}
