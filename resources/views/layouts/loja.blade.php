<li>
    <a href="http://localhost:4200/">Home</a>
</li>
@if (empty(Auth::user()))
<li>
    <a href="http://localhost:4200/login">Login</a>
</li>
@endif
<li>
    <a href="http://localhost:4200/carrinho">Carrinho</a>
</li>
<li>
    <a href="http://localhost:4200/produtos/buscar">Buscar produtos</a>
</li>
@if (Auth::user())
<li>
    <a href="http://localhost:4200/logout">Sair</a>
</li>
@endif