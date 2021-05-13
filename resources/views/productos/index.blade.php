@extends('layaout.base')

@section('titulopagina')
    inicio
@endsection

@section('contenido')

    <div class="container">
        <h1 class="text-center">Listado de productos</h1>
        <div class="row">
                @foreach ($productos as $producto)
                    <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('storage'.'/'.$producto->imagen_producto) }}"  alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$producto->nom_producto}}</h5>
                            <p class="card-text">Precio: $.{{$producto->precio_producto}}</p>
                            <p class="card-text">Cantidad Disp. {{$producto->stock_producto}}</p>
                            <div class="row">
                                @if ($producto->estado_producto == false && $producto->stock_producto >=1)
                                    <div  class="col md-2">
                                        <form action="{{url('/producto/'.$producto->id)}}" method="POST">
                                            @csrf
                                            {{method_field('PATCH')}}
                                            <input type="number" hidden name="estado_producto" id="estado_producto" value="1">
                                            <input type="submit"class="btn btn-primary btn-md" value="Publicar">
                                        </form>
                                    </div>
                                @elseif ($producto->estado_producto == True && $producto->stock_producto >=1)                                        
                                    <div  class="col md-2">
                                        <form action="{{url('/producto/'.$producto->id)}}" method="post">
                                            @csrf
                                            {{method_field('PATCH')}}
                                            <input type="number" hidden name="estado_producto" id="estado_producto" value="0">
                                            <input type="submit"class="btn btn-primary btn-md" value="Deshabilitar">
                                        </form>
                                    </div>
                                        
                                @endif    
                                    <div  class="col md-2">
                                        <a href="{{ url('/producto/'.$producto->id.'/edit')}}" class="btn btn-warning btn-md">Editar</a>
                                    </div>
                                    <div class="col">
                                        <form action="{{url('/producto/'.$producto->id)}}" method="post">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <div class="col">
                                            
                                                <input class="btn btn-danger btn-md" onclick="return confirm('DEsea borrar?')" type="submit" value="Eliminar">
                                            </div>
                                        
                                         </form>
                                    </div>
                            </div>
                        
                        </div>
                    </div>
                @endforeach
        </div>
    </div>

@endsection
