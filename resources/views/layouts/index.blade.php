<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loja</title>
    
    <style>
        * {
            margin: 0 auto;
            padding: 0;
            box-sizing: border-box;
        }

        img {
            height: 50px;
            width: 50px;
            text-align: center;
        }

        span {
            background-color: black;
            font-weight: bold;
            color: white;
        }

        select {
            width: 207px;
        }


        .align-center {
            text-align: center;
        }

        .align-right {
            text-align: right;
        }

        .align-left {
            text-align: left;
        }
        .options {
            display: flex;
        }

        th, td {
            text-align: center;
            padding: 5px;
        }
        
        #menu-h ul {
            max-width: 800px;
            list-style: none;
            padding: 0;
            text-align: center;
        }
        
        #menu-h ul li {
            display: inline;
        }
        
        #menu-h ul li a {
            display: inline-block;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div>
        <nav id="menu-h">
            <ul>
                @if (empty(Auth::user()))
                    @include('layouts.loja')
                @elseif (Auth::user()->user_type == 0)
                    @include('layouts.loja')
                @else
                    @include('layouts.admin')
                @endif
            </ul>
        </nav>
    </div>
    <br>
    <div>
        @yield('content')
    </div>
    <div>
        <!-- rodapé !-->
    </div>
</body>
</html>