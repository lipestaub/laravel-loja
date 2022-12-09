<div class="text-center">
    <header class="py-3 container d-flex flex-wrap text-center">
        <div class="col-xs-4 mb-auto mt-auto">
            <a href="/" class="align-items-center text-dark text-decoration-none">
                <span class="fs-4">Home</span>
            </a>
        </div>
        <div class="col-xs-4 m-auto">
            {{ Form::open(['url' => 'produtos/buscar/resultados', 'method' => 'post']) }}
                {{ Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar', 'id' => 'campoBusca'])}}
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
            {{ Form::close() }}
        </div>
        <nav class="col-xs-4">
            <ul class="nav">
                <div class="col-xs-1 mb-auto mt-auto">
                    <div class="d-inline-flex">
                        <li>
                            <a href="/carrinho" class="nav-link link-dark px-2"><i class="fa fa-shopping-cart"></i> Carrinho</a>
                        </li>
                        <span class="p-2">Itens: {{ /*$totalItensCarrinho*/ 0}} R$ {{ /*$valorTotalCarrinho*/ 0 }}</span>
                    </div>
                    <div class="d-flex">
                        <li>
                            <a href="{{ '/usuario/' . Auth::user()->id }}" class="nav-link link-dark px-2"><i class="fa fa-user"></i> Minha conta</a>
                        </li>
                        <li>
                            <a href="/meus-pedidos" class="nav-link link-dark px-2"><i class="fa fa-cubes"></i> Meus pedidos</a>
                        </li>
                        @if (Auth::user())
                            <li>
                                <a href="/logout" class="nav-link link-dark px-2"><i class="fa fa-sign-out"></i> Sair</a>
                            </li>
                        @endif
                    </div>
                </div>
            </ul>
        </nav>
    </header>
</div>
