@extends('layaout.base')

@section('titulopagina')
    inicio
@endsection

@section('contenido')

    <div class="container">
        <h1 class="text-center">Productos tienda</h1>
        <div class="text-center">
            <a class="btn btn-success" href="{{ url('producto/create') }}">Crear Producto</a>
        </div>

    </div>

@endsection
