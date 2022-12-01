<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Route;

Route::auth();

Route::get('/logout', 'LoginController@logout');

Route::get('/', 'ProdutoController@index');

Route::group(array('prefix' => 'produtos'), function()
{
    Route::group(array('prefix' => 'buscar'), function()
    {
        Route::get('/', function () {
            return view('produtos.buscar');
        });
        Route::post('resultados', 'ProdutoController@buscar');
    });

    Route::post('salvar', 'ProdutoController@salvar');
    Route::get('comprar/{id}', 'ProdutoController@comprar');

    Route::group(array('middleware' => ['admin']), function()
    {
        Route::get('/', 'ProdutoController@listar');
        Route::get('formulario/{id?}', 'ProdutoController@formularioCadastro');
        Route::get('deletar/{id}', 'ProdutoController@deletar');
        Route::group(array('prefix' => 'controle-de-estoque'), function()
        {
            Route::get('/', 'ProdutoController@controleDeEstoque');
            Route::post('registrar', 'ProdutoController@registrarMovimentacaoEstoque');

        });
    });
});

Route::group(array('prefix' => 'usuarios', 'middleware' => ['admin']), function()
{
    Route::get('/', 'UsuarioController@listar');
    Route::get('formulario/{id?}', 'UsuarioController@formularioCadastro');
    Route::post('salvar', 'UsuarioController@salvar');
    Route::get('deletar/{id}', 'UsuarioController@deletar');
});

Route::group(array('prefix' => 'carrinho'), function()
{
    Route::get('editar/{id}', 'CarrinhoController@editar');
    Route::post('salvar-edicao', 'CarrinhoController@salvar');
    Route::get('deletar/{id}', 'CarrinhoController@deletar');
    Route::get('/', 'CarrinhoController@listar');
    Route::post('finalizar/{orderId}', 'CarrinhoController@finalizarPedido');
});