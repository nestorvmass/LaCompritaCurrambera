@extends('layaout.base')

@section('titulopagina')
    Editar Producto
@endsection

@section('contenido')
    
    <div class="container-md">


        <h1>Edicion de usuario</h1>


        {{-- formulario --}}
        <form action="{{url('admin/'. $usuario->id)}}" class="row g-7" method="POST" enctype="multipart/form-data">
            
            @csrf
            {{ method_field('PATCH') }}
            {{-- Campo de Nombre --}}
            <div class="form-floating  col-md-4">
                <input type="text" class="form-control" name="name" id="name" placeholder="name@example.com" value="{{ $usuario->name }}" required>
                <label for="name">Nombre</label>
            </div>
            <div class="row g-3">
                {{-- campo de Email --}}
                <div class="form-floating col-md-4" >
                    <input type="email" class="form-control" name="email" id="email" value="{{ $usuario->email }}" placeholder="..." readonly>
                    <label for="email">Email</label>
                </div>
                {{-- campo de contraseña --}}
                <div class="form-floating col-md-4">
                    <input type="password" class="form-control" name="password" id="password">
                    <label for="password">Contraseña</label>
                </div>

                <div class="form-floating col-md-4">
                    <input type="password" class="form-control" name="confirm-password" id="confirm-password">
                    <label for="password">Confirmar Contraseña</label>
                </div>
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