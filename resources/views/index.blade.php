@extends('layouts.index')

@section('content')
    <div class="align-center">
        <h3>Home</h3>
        <br>
    </div>
    <br>
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
@endsection