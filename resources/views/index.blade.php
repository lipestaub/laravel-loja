@extends('layouts.index')

@section('content')
    <div class="align-center">
        <h3>Home</h3>
        <br>
    </div>
    <div class="row">
        <div class="col-md-2 float-left no-margin">
            <div class="bg-orange">
                <b><span class="text-white"><i class="fa fa-bullhorn"></i> Lançamentos</span></b>
            </div>
            @foreach ($lastProducts as $lastProduct)
                <div class="border text-center">
                    <div>
                        @if ($lastProduct->image_path == null)
                            <img class="img-fluid" src="{{ asset('defaultProductImage.jpg') }}">
                        @else
                            <img class="img-fluid" src="{{ asset($lastProduct->image_path) }}">
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

        <div class="col-md-10 no-margin float-right">
            <div class="bg-primary">
                <b><span class="text-white p-1"><i class="fa fa-chevron-right"></i> Destaques</span></b>
            </div>
            <div class="text-center">
                @foreach ($produtos as $produto)
                    <div class="d-inline-block text-center border col-md-2">
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
    </div>
@endsection