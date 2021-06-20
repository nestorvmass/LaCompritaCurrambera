<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ url('/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Boostrasp 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  

    <title>{{ config('app.name') }} - @yield('titulopagina')</title>
</head>
<body>
      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
          <div class="container">
            <img class="img-fluid" width="30" height="24" src="https://image.flaticon.com/icons/png/512/423/423503.png" alt="" srcset="">
              <a class="navbar-brand" href="{{ url('/') }}">
                  {{ config('app.name', 'Laravel') }}
                  
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <!-- Left Side Of Navbar -->
                  @if (Auth::check())
                  <div class="container-fluid">
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                          
                            <a class="nav-link active"  aria-current="page" href="/">Inicio</a>

                        </ul>
                        <ul>
                          <form method="get" class="mt-2 d-flex" >
                            <input class="form-control me-2" name="search" type="search" placeholder="busqueda de producto" aria-label="Search">
                            <button class="btn btn-outline-success"  type="submit">Buscar</button>
                        </form>
                        </ul>
                      </div>
                    </div>
                    
                  @endif
                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto">
                      <!-- Authentication Links -->
                      @guest
                      <a class="nav-link active" aria-current="page" href="/">Inicio</a>

                          @if (Route::has('login'))
                            <ul class="col-md-offset-2 nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesion') }}</a>
                            </ul>
                          @endif

                          @if (Route::has('register'))
                              <ul class="col-md-offset-2 nav-item">
                                  <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                              </ul>
                              <ul>
                                <form class="mt-2 d-flex">
                                  <input class="form-control me-2" name="search" type="search" placeholder="busqueda de producto" aria-label="Search">
                                  <button class="btn btn-outline-success" type="submit">Buscar</button>
                              </form>
                              </ul>
                          @endif
                      @else
                      
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @can('admin.index')
                            <li>
                              <a class="nav-link" href="{{ route( 'admin.index') }}">Administracion de usuario</a>
                            </li>
                              
                            @endcan
                            @can('producto.create')
                              
                            <li>
                              <a class="nav-link" href="{{ url('producto') }}">Mis Productos</a>
                            </li>
                            @endcan
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                               {{ __('Logout') }}
                           </a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                          </form>
                        
                      @endguest
                  </ul>
              </div>
          </div>
      </nav>
    
    @yield('contenido')

</body>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>


</html>