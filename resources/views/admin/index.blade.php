@extends('layaout.base')

@section('titulopagina')
    inicio
@endsection

@section('contenido')

<div class="container">
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Employee Info</p>
        </div>

        @if(session('status'))
      
            <div class="{{ session('class') }}" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="card-body">
            <div class="row">
                <div class="col-md-6 text-nowrap">
                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show <select class="d-inline-block form-select form-select-sm">
                                <option value="10" selected>10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> </label></div>
                </div>
                <div class="col-md-6">
                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search" /></label></div>
                </div>
            </div>
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
                                Edicion
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
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                </div>
                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
