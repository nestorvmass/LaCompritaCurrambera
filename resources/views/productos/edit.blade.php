@extends('layaout.base')

@section('titulopagina')
    Editar Producto
@endsection

@section('contenido')
    
    <div class="container-md">


        <h1>Editar Producto</h1>


        {{-- formulario --}}
        <form action="{{url('producto/'. $producto->id)}}" class="row g-7" method="POST" enctype="multipart/form-data">
            
            @csrf
            {{ method_field('PATCH') }}
            {{-- Campo de Nombre de producto --}}
            <div class="form-floating  col-md-4">
                <input type="text" class="form-control" name="nom_producto" id="nom_producto" placeholder="name@example.com" value="{{ $producto->nom_producto }}" required>
                <label for="nom_producto">Nombre del producto</label>
            </div>
            <div class="row g-3">
                {{-- campo de precio de producto --}}
                <div class="form-floating col-md-4" >
                    <input type="number" class="form-control" name="precio_producto" id="precio_producto" value="{{ $producto->precio_producto }}" placeholder="..." required>
                    <label for="precio_producto">Precio producto</label>
                </div>
                {{-- campo de cantidad disponible --}}
                <div class="form-floating col-md-4">
                    <input type="number" class="form-control" name="stock_producto" id="stock_producto" value="{{ $producto->stock_producto }}" placeholder="..." required>
                    <label for="stock_producto">Cantidad Disponible</label>
                </div>
            </div>

            {{-- campo de descripcion de producto --}}
            <div class="form-floating mt-4">
                <textarea class="form-control" placeholder="..." name="desc_producto" id="desc_producto" style="height: 100px" required>{{ $producto->desc_producto }}</textarea>
                <label for="desc_producto">Descripcion Producto</label>
            </div> 


            {{-- campo de imagen de producto --}}
            <div class="mb-4 mt-4 ">
                
                <label for="imagen_producto	" class="form-label">Imagen del producto</label>
                <div>
                    <img class="fluid-img" width="262" height="262"src="{{ asset('storage'.'/'.$producto->imagen_producto) }}" alt="">
                </div>
                <input class="form-control" type="file" name="imagen_producto" id="imagen_producto">
            </div>

            <div class="row g-3">
                <div class="form-floating col-md-4 ">
                    <input class="btn btn-success " type="submit" value="Guardar">
                    <input class="btn btn-warning" type="submit"  value="Cancelar">
                </div>
            </div>
        </form>
        


    </div>
     
@endsection