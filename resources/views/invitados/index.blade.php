@extends('layaout.base')

@section('titulopagina')
    inicio
@endsection

@section('contenido')

    <div class="container">
        <h1 class="text-center">Listado de productos</h1>
        <div class="row center">
                @foreach ($productos as $producto)
                    @if ($producto->estado_producto)
                        <div class="card" style="width: 18rem;">
                            {{-- <img src="{{Storage::disk('s3')->url($producto->imagen_producto)}}"> --}}
                            <img class="card-img-top"  src="{{Storage::disk('s3')->url($producto->imagen_producto)}}"  alt="{{$producto->nom_producto}}">
                            {{-- <img class="card-img-top"  src="{{ asset('storage'.'/'.$producto->imagen_producto) }}"  alt="{{$producto->nom_producto}}"> --}}
                        <div class="card-body">
                            <h5 class="card-title">{{$producto->nom_producto}}</h5>
                            <p class="card-text">Precio: ${{$producto->precio_producto}}</p>
                            <p class="card-text">Disponibles: {{$producto->stock_producto}}</p>
                            <div class="row">
                                
                            </div>
                        
                        </div>
                    </div>
                        
                    @endif
                    
                @endforeach
        </div>
    </div>

@endsection
