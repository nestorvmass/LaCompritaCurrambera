@extends('layaout.base')

@section('titulopagina')
    inicio
@endsection

@section('contenido')

    <div class="container">
        <h1>Listado de productos</h1>
        <div class="row">
                @foreach ($productos as $producto)
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="https://www.elmueble.com/medio/2019/05/22/00501844_da5fe054_1500x2000.jpg"  alt="...">
                        <div class="card-body">
                        <h5 class="card-title">{{$producto->nom_producto}}</h5>
                        <p class="card-text">Precio: $.{{$producto->precio_producto}}</p>
                        <p class="card-text">Cantidad Disp. {{$producto->stock_producto}}</p>
                        <div class="rows ">
                            {{-- <a href="#" class="btn btn-primary">Publicar</a> --}}
                            {{-- <a href="#" class="btn btn-warning">Editar</a> --}}
                            <div class="col-sm-12 text-center">
                                <form action="{{url('/producto/'.$producto->id)}}" method="post">
                                    @csrf
                                    {{method_field('UPDATE')}}
                                    <input type="submit"class="btn btn-primary btn-md" value="Publicar">
                                </form>
                                <a href="{{ url('/producto/'.$producto->id.'/edit')}}" class="btn btn-warning btn-md">Editar</a>
                                
                                <form action="{{url('/producto/'.$producto->id)}}" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <input class="btn btn-danger btn-md" onclick="return confirm('DEsea borrar?')" type="submit" value="Eliminar">
                                </form>
                            </div>
                            
                        </div>
                        
                        </div>
                    </div>
                @endforeach
        </div>
    </div>

@endsection
