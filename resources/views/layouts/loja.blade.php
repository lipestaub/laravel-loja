<li>
    <a href="http://localhost:4200/" class="nav-link link-dark px-2">Home</a>
</li>
@if (empty(Auth::user()))
<li>
    <a href="http://localhost:4200/login" class="nav-link link-dark px-2">Login</a>
</li>
@endif
<li>
    <a href="http://localhost:4200/carrinho" class="nav-link link-dark px-2">Carrinho</a>
</li>
@if (Auth::user())
<li>
    <a href="http://localhost:4200/logout" class="nav-link link-dark px-2">Sair</a>
</li>
@endif