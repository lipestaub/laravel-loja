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
        <!--<header class="py-3 mb-4 border-bottom">
            <div class="container d-flex flex-wrap justify-content-center">
              <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto col-4 text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-4">Double header</span>
              </a>
              @include('layouts.buscar')
            </div>
        </header>-->
        <nav class="py-2 bg-light border-bottom">
            <div class="container d-flex flex-wrap">
                <ul class="nav me-auto">
                    @if (empty(Auth::user()))
                        @include('layouts.loja')
                    @elseif (Auth::user()->user_type == 0)
                        @include('layouts.loja')
                    @else
                        @include('layouts.admin')
                    @endif
                </ul>
            </div>
        </nav>
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