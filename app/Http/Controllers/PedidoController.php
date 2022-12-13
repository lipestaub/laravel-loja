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
        $pedido = Order::with([ 'orderedItem' => function( $query ){ return $query->with('product'); } ])->find($id);
        $strtotime = strtotime($pedido->updated_at->format('d-m-Y H:i'));
        $strtotime -= 3600 * 3;
        $horarioPedido = date('d/m/Y - H:i', $strtotime);

        $orderedItems = $pedido->orderedItem->map(function ($orderedItem) {
            $price = (float) str_replace(',', '.', $orderedItem->product->price);
            $quantity = (float) $orderedItem->quantity;
                
            $orderedItem->valorTotal = $price * $quantity;
          
            //$orderedItem->product->price = number_format($price, 2, ',', '.');
          
            return $orderedItem;
        });
          
        //$valorTotal = "R$ " . number_format($orderedItems->sum('valorTotal'), 2, ',', '.');
        $valorTotal = $orderedItems->sum('valorTotal');
        $view = ['id' => $id, 'orderedItems' => $orderedItems, 'horarioPedido' => $horarioPedido, 'valorTotal' => $valorTotal];
    
        return view('pedidos.detalhar', $view);
    }
}
