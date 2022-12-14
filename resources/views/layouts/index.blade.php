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
    <div class="container">
            @if (empty(Auth::user()) || Auth::user()->user_type == 0)
                @include('layouts.loja')
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