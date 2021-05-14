@extends('layaout\base')

@section('titulopagina')
    inicio
@endsection

@section('contenido')

    <div class="container">
        <h1 class="text-center">Listado de productos</h1>
        <div class="row">
                @foreach ($productos as $producto)
                    @if ($producto->estado_producto)
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('storage'.'/'.$producto->imagen_producto) }}"  alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$producto->nom_producto}}</h5>
                            <p class="card-text">Precio: $.{{$producto->precio_producto}}</p>
                            <p class="card-text">Cantidad Disp. {{$producto->stock_producto}}</p>
                            <div class="row">
                                
                            </div>
                        
                        </div>
                    </div>
                        
                    @endif
                    
                @endforeach
        </div>
    </div>

@endsection
