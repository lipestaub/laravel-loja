<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderedItem;
use Illuminate\Http\Request;
use App\Product;
use App\Record;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Product::all();
        $view = ['produtos' => $produtos];

        return view('index', $view);
    }

    public function listar()
    {
        $produtos = Product::all();
        $view = ['produtos' => $produtos];

        return view('produtos.listar', $view);
    }

    public function formularioCadastro($id = null)
    {
        $title = null;

        if ($id == null) {
            $produto = new Product();
        }
        else {
            $produto = Product::find($id);
            $title = "Editar produto";
        }

        $view = ['produto' => $produto, 'title' => $title];

        return view('produtos.cadastrar', $view);
    }

    public function salvar(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);

        $form['price'] = str_replace(',', '.', $form['price']);
        $form['price'] = number_format((float) $form['price'], 3, '.', '');

        $numeroErros = 0;
        $erros = [];

        if (strlen($form['description']) < 2) {
            $numeroErros += 1;
            array_push($erros, 'descrição');
        }

        if ((float) $form['price'] <= 0) {
            $numeroErros += 1;
            array_push($erros, 'preço');
        }

        if ($numeroErros > 0) {
            $erros = implode(', ', $erros);
            
            $request->session()->flash('warning', 'Verfique os campos (' . $erros . ') e tente novamente.');
            return redirect()->back()->withInput($request->all());
        }

        $uploadedFile = isset($form['image_path']) ? $form['image_path'] : null;
        
        try {
            DB::transaction(function() use ($form, $uploadedFile) {
                unset($form['image_path']);

                if (empty($form['id'])) {
                    $product = Product::create($form);
                    $form['id'] = $product->id;
                }

                if ($uploadedFile != null) {
                    $form['image_path'] = $this->image($uploadedFile, $form['id']);
                }

                Product::whereId($form['id'])->update($form);
            });
        }
        catch(\Exception $e) {
            return redirect('produtos/cadastrar')->withInput($request->all());
        }
        return redirect('produtos/');
    }

    public function comprar($id)
    {
        if (!Auth::user()) {
            return redirect('/login');
        }

        if (!Session::has('order_id') || Session::get('order_id') == null) {
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'status' => 0
            ]);

            $orderId = $order->id;

            Session::set('order_id', $orderId);
        }
        else {
            $orderId = Session::get('order_id');
        }

        $orderedProduct = false;

        $a = OrderedItem::whereOrderId($orderId)->get();

        foreach ($a as $item) {
            if ($item->product_id == $id) {
                $orderedProduct = true;
            }
        }

        if ($orderedProduct) {
            $orderedItem = [
                'order_id' => $orderId,
                'product_id' => $id,
                'quantity' => OrderedItem::where(['order_id' => $orderId, 'product_id' => $id])->get()[0]->quantity + 1
            ];
            
            OrderedItem::where(['order_id' => $orderId, 'product_id' => $id])->update($orderedItem);
        }
        else {
            $orderedItem = [
                'order_id' => $orderId,
                'product_id' => $id,
                'quantity' => 1
            ];

            OrderedItem::create($orderedItem);
        }

        return redirect('/');
    }

    public function deletar($id)
    {
        $pastaProduto = public_path() . '/productImages/' . $id;

        if (is_dir($pastaProduto)) {
            $imagensProduto = scandir($pastaProduto);

            foreach ($imagensProduto as $imagem) {
                if ($imagem != '.' && $imagem != '..') {
                    unlink($pastaProduto . '/' . $imagem);
                }
            }
    
            rmdir($pastaProduto);
        }
        Product::whereId($id)->delete();
        return redirect('produtos/');
    }

    public function controleDeEstoque()
    {
        $produtos = Product::orderBy('description','desc')->lists('description','id')->toArray();

        $produtos[0] = 'Selecione...';
        $produtos = array_reverse($produtos, true);

        $view = ['products' => $produtos];

        return view('controleEstoque', $view);
    }

    public function registrarMovimentacaoEstoque(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);

        $numeroErros = 0;
        $erros = [];

        if ($form['product_id'] == 0) {
            $numeroErros += 1;
            array_push($erros, 'produto');
        }

        if ($form['type'] == 0) {
            $numeroErros += 1;
            array_push($erros, 'tipo');
        }

        if ((float) $form['quantity'] == 0) {
            $numeroErros += 1;
            array_push($erros, 'quantidade');
        }

        if ($numeroErros > 0) {
            $erros = implode(', ', $erros);
            
            $request->session()->flash('warning', 'Verfique os campos (' . $erros . ') e tente novamente.');
            return redirect()->back()->withInput($request->all());
        }

        $form['type'] = $form['type'] - 1;

        $record = [
            'user_id' => Auth::user()->id,
            'origin' => Auth::user()->document,
            'product_id' => $form['product_id'],
            'quantity' => $form['quantity'],
            'type' => $form['type']
        ];

        $product = Product::whereId($form['product_id'])->first();

        if ($form['type'] == 0) {
            $newStock = $product->stock - $form['quantity'];
        }
        else {
            $newStock = $product->stock + $form['quantity'];
        }

        $product = [
            'description' => $product->description,
            'price' => $product->price,
            'stock' => $newStock,
        ];

        Record::create($record);
        Product::whereId($form['product_id'])->update($product);

        return redirect()->back();
    }

    public function buscar(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);

        $produtos = [];

        if (strlen($form['search']) < 2) {
            $request->session()->flash('warning', 'A busca deve conter ao menos 2 caracteres.');
        }
        else {
            Session::forget('warning');
            $produtos = Product::where('description', 'like', '%'.$form['search'].'%')->get();
        }

        $view = ['produtos' => $produtos];

        return view('produtos.buscar', $view);
    }

    private function image($uploadedFile, $productId)
    {
        $path = '../public/productImages/' . $productId;
        $fileName = 'img1.' . $uploadedFile->getClientOriginalExtension();

        $imagePath = 'productImages/' . $productId . '/' . $fileName;

        if (!is_dir($path)) {
            mkdir($path, 0777);
        }

        $uploadedFile->move($path, $fileName);

        return $imagePath;
    }
}
