<li>
    <a href="http://localhost:4200/carrinho" class="nav-link link-dark px-2"><i class="fa fa-shopping-cart"></i> Carrinho</a>
</li>
<li>
    <a href="http://localhost:4200/minha-conta" class="nav-link link-dark px-2"><i class="fa fa-user"></i> Minha conta</a>
</li>
<li>
    <a href="http://localhost:4200/meus-pedidos" class="nav-link link-dark px-2"><i class="fa fa-cubes"></i> Meus pedidos</a>
</li>

@if (Auth::user())
    <li>
        <a href="http://localhost:4200/logout" class="nav-link link-dark px-2">Sair</a>
    </li>
@endif