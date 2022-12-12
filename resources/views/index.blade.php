@extends('layouts.index')

@section('content')
    <div class="align-center">
        <h3>Home</h3>
        <br>
    </div>
    <br>
    <div class="d-flex">
        <div class="text-center border p-2 m-1">
            <span>Lan&ccedil;amentos</span>
            <br>
            @foreach ($lastProducts as $lastProduct)
                <div class="border p-2 m-1 text-center">
                    <div>
                        @if ($lastProduct->image_path == null)
                            <img src="{{ asset('defaultProductImage.jpg') }}">
                        @else
                            <img class="" src="{{ asset($lastProduct->image_path) }}">
                        @endif
                    </div>
                    <div>
                        {{ $lastProduct->description }}
                    </div>
                    <div>
                        {{'R$ ' . $lastProduct->price }}
                    </div>
                    <div>
                        <a class="btn btn-primary" href="/produtos/comprar/{{ $lastProduct->id }}">Comprar</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-xs-12">
            @foreach ($produtos as $produto)
                <div class="col-xs-3 d-inline-block text-center p-2 border m-1">
                    <div>
                        @if ($produto->image_path == null)
                            <img src="{{ asset('defaultProductImage.jpg') }}">
                        @else
                            <img class="" src="{{ asset($produto->image_path) }}">
                        @endif
                    </div>
                    <div>
                        {{ $produto->description }}
                    </div>
                    <div>
                        {{'R$ ' . $produto->price }}
                    </div>
                    <div>
                        <a class="btn btn-primary" href="/produtos/comprar/{{ $produto->id }}">Comprar</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection