@extends('layaout.base')

@section('titulopagina')
    inicio
@endsection

@section('contenido')

<div class="container">
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Listado de usuarios</p>
        </div>
        @can('admin.create')
            
            <div class="col3">
                <a class="btn btn-success" href="{{ url('/admin/create')  }}">Crear Usuario</a>
                {{-- <a class="btn btn-success" href="{{ url('producto/create') }}">Crear Producto</a> --}}

            </div>
        @endcan

        @if(session('status'))
      
            <div class="{{ session('class') }}" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Acciones</th>
    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
    
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>

                                    @can('editar')
                
                                        {{-- Editar --}}
                                        <div  class="col md-2">
                                            <a href="{{ url('/admin/'.$usuario->id.'/edit')}}" class="btn btn-warning btn-md">Editar</a>
                                        </div>
                              
                                    @endcan

                                    @can('eliminar')
                                        
                                        {{-- Eliminar --}}

                                        <div class="col">
                                            <form action="{{url('/admin/'.$usuario->id)}}" method="post">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <div class="col">
                                                    <input hidden type="text" name="email" id="email" value="{{ Auth::user()->email }}">
                                                    <input hidden type="text" name="name" id="name" value="{{ Auth::user()->name }}">
                                                    <input class="btn btn-danger btn-md" onclick="return confirm('Desea borrar?')" type="submit" value="Eliminar">
                                                </div>
                                            
                                            </form>
                                        </div>
                                    @endcan



                                </td>
                            </tr>
                            
                        @endforeach
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>ID</strong></td>
                            <td><strong>Nombre</strong></td>
                            <td><strong>Email</strong></td>
                            <td><strong>Acciones</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            </div>
        </div>
    </div>
</div>

@endsection
