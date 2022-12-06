<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    
    {!!Html::style("bootstrap/css/bootstrap.min.css")!!}
    {!!Html::style("site.css")!!}
    {!!Html::script("bootstrap/js/bootstrap.bundle.min.js")!!}
    
    <title>Loja</title>
</head>
<body>
    <div>
            @if (empty(Auth::user()) || Auth::user()->user_type == 0)
                <div class="col col-xs-12">
                    <header class="py-3">
                        <div class="container d-flex flex-wrap">
                            <div class="col col-xs-1 mb-auto mt-auto">
                                <a href="/" class="align-items-center text-dark text-decoration-none">
                                    <span class="fs-4">Home</span>
                                </a>
                            </div>
                            <div class="col col-xs-3 m-auto">
                                {{ Form::open(['url' => 'produtos/buscar/resultados', 'method' => 'post']) }}
                                    {{ Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar', 'id' => 'campoBusca'])}}
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                {{ Form::close() }}
                            </div>
                            <nav>
                                <ul class="nav">
                                    <div class="col col-xs-1 mb-auto mt-auto">
                                        <div class="d-inline-flex">
                                            <li>
                                                <a href="http://localhost:4200/carrinho" class="nav-link link-dark px-2"><i class="fa fa-shopping-cart"></i> Carrinho</a>
                                            </li>
                                            <span class="p-2">Itens: {{ /*$totalItensCarrinho*/ 0}} R$ {{ /*$valorTotalCarrinho*/ 0 }}</span>
                                        </div>
                                        <div class="d-flex">
                                            <li>
                                                <a href="http://localhost:4200/minha-conta" class="nav-link link-dark px-2"><i class="fa fa-user"></i> Minha conta</a>
                                            </li>
                                            <li>
                                                <a href="http://localhost:4200/meus-pedidos" class="nav-link link-dark px-2"><i class="fa fa-cubes"></i> Meus pedidos</a>
                                            </li>
                                        </div>
                                    </div>
                                </ul>
                            </nav>
                        </div>
                    </header>
                </div>
            @elseif (Auth::user()->user_type == 0)
            @include('layouts.loja')
            @else
            <nav class="py-2 bg-light border-bottom">
                <div class="container d-flex flex-wrap">
                    <ul class="nav me-auto">
                        @include('layouts.admin')
                    </ul>
                </div>
            </nav>
            @endif
        </ul>
    </div>
    <br>
    <div class="container">
        @yield('content')
    </div>
    <div>
        <!-- rodapé !-->
    </div>
</body>
</html>