@extends('layaout.base')

@section('titulopagina')
    Crear producto
@endsection

@section('contenido')

    {{-- id_vendedor, nombre producto, precio, cantidad stock, descripcion producto, estado --}}
    <div class="container-md">


        <h2 class='text-center d-grid gap-3'>Creacion de nuevo producto</h2>


        {{-- formulario --}}
        <form action="{{url('producto')}}" class="row g-7" method="POST" enctype="multipart/form-data">
            @csrf            
            {{-- Campo de Nombre de producto --}}
            <div class="form-floating  col-md-4">
                <input type="text" class="form-control" name="nom_producto" id="nom_producto" placeholder="name@example.com" required>
                <label for="nom_producto">Nombre del producto</label>
            </div>
            <div class="row g-3">
                {{-- campo de precio de producto --}}
                <div class="form-floating col-md-4" >
                    <input type="number" class="form-control" name="precio_producto" id="precio_producto" placeholder="..." required>
                    <label for="precio_producto">Precio producto</label>
                </div>
                {{-- campo de cantidad disponible --}}
                <div class="form-floating col-md-4">
                    <input type="number" class="form-control" name="stock_producto" id="stock_producto" placeholder="..." required>
                    <label for="stock_producto">Cantidad Disponible</label>
                </div>
            </div>

            {{-- campo de descripcion de producto --}}
            <div class="form-floating mt-4">
                <textarea class="form-control" placeholder="..." name="desc_producto" id="desc_producto" style="height: 100px" required></textarea>
                <label for="desc_producto">Descripcion Producto</label>
            </div> 


            {{-- campo de imagen de producto --}}
            <div class="mb-4 mt-4 ">
                <label for="imagen_producto	" class="form-label">Imagen del producto</label>
                <input class="form-control" type="file" name="imagen_producto" id="imagen_producto" required>
            </div>
            <input hidden type="text" name="email" id="email" value="{{ Auth::user()->email }}">
            <input hidden type="text" name="name" id="name" value="{{ Auth::user()->name }}">

            <div class="row g-3">
                <div class="form-floating col-md-4 ">
                    <input class="btn btn-success " type="submit" value="Guardar">
                    <input class="btn btn-warning" type="submit"  value="Cancelar">
                </div>
            </div>
        </form>
        


    </div>

@endsection