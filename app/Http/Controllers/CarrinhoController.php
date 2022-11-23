<?php
 
namespace App\Http\Controllers;
 
use App\Http\Requests;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OrderedItem;
use App\Product;
use App\Record;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CarrinhoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function listar()
    {
        if (Session::has('order_id')) {
            $valorTotalCarrinho = 0;

            $orderId = Session::get('order_id');

            $orderedItems = OrderedItem::with('product')->whereOrderId($orderId)->get();

            if(!$orderedItems->isEmpty()) {
                foreach ($orderedItems as $orderedItem) {
                    $price = (float) str_replace(',', '.', $orderedItem->product->price);
                    $quantity = (float) $orderedItem->quantity;
                    $valorTotalProduto = $price * $quantity;
                    
                    $valorTotalCarrinho += $valorTotalProduto;
                }
    
                $orderedItems->put('valorTotal', str_replace('.', ',', $valorTotalCarrinho));
            }

            $view = ['orderedItems' => $orderedItems];

            return view('carrinho', $view);
        }
        else {
            $view = ['orderedItems' => []];

            return view('carrinho', $view);
        }     
    }

    public function editar($id)
    {
        $orderId = Session::get('order_id');

        $orderedItem = OrderedItem::with('product')->where(['id' => $id])->first();
        $view = ['orderedItem' => $orderedItem];

        return view('editarPedido', $view);
    }

    public function salvar(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);

        if ($form['quantity'] > 0) {
            $description = $form['product']['description'];
            $price = $form['product']['price'];

            $orderedItem = [
                'order_id' => Session::get('order_id'),
                'product_id' => Product::where(['description' => $description, 'price' => $price])->get(['id'])->toArray()[0]['id'],
                'quantity' => $form['quantity']
            ];
            
            OrderedItem::whereId($form['id'])->update($orderedItem);
        }
        else {
            $this->deletar($form['id']);
        }

        return redirect('/carrinho');
    }

    public function deletar($id)
    {
        OrderedItem::whereId($id)->delete();

        return redirect('carrinho/');
    }

    public function finalizarPedido($orderId)
    {
        $order = [
            'user_id' => Auth::user()->id,
            'status' => 1,
        ];

        $orderedItems = OrderedItem::with('product')->whereOrderId($orderId)->get();

        $nfMessage = "Olá " . Auth::user()->name . ", seu pedido foi finalizado!";
        $nfMessage .= "\n\nCódido do pedido = " . $orderId . "\n";

        $valorTotalPedido = 0;

        foreach ($orderedItems as $orderedItem) {
            $price = (float) str_replace(',', '.', $orderedItem->product->price);
            $quantity = (float) $orderedItem->quantity;
            $valorTotalProduto = $price * $quantity;

            $nfMessage .= "\n" . $orderedItem->product->description . " - " . $orderedItem->quantity . " un. - R$ " . number_format($price, 2, ',', '.');
            
            $valorTotalPedido += $valorTotalProduto;

            $product = [
                'description' => $orderedItem->product->description,
                'price' => str_replace(',', '.', $orderedItem->product->price),
                'stock' => $orderedItem->product->stock - $orderedItem->quantity,
            ];

            Product::whereId($orderedItem->product_id)->update($product);

            $record = [
                'user_id' => Auth::user()->id,
                'origin' => (int) $orderId,
                'product_id' => $orderedItem->product_id,
                'quantity' => $orderedItem->quantity,
                'type' => '0'
            ];

            Record::create($record);
        }

        Order::where(['id' => $orderId])->update($order);

        $nfMessage .= "\n\n" . "Valor total = R$ " . number_format($valorTotalPedido, 2, ',', '.');

        $chatId = 5670662196;

        $nfMessage = urlencode($nfMessage);

        $url = "https://api.telegram.org/bot" . env("TELEGRAM_BOT_TOKEN") . "/sendMessage?chat_id=" . $chatId . "&parse_mode=HTML&text=" . $nfMessage;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_exec($ch);
        curl_close($ch);

        Session::forget('order_id');

        return redirect('/');
    }
}