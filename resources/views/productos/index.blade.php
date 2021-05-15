@extends('layaout.base')

@section('titulopagina')
    inicio
@endsection

@section('contenido')

    <div class="container">
        <h1 class="text-center">Listado de productos</h1>
        <div class="text-center">
        <a class="btn btn-success" href="{{ url('producto/create') }}">Crear Producto</a>
        </div>
        <div class="row">
                @foreach ($productos as $producto)
                @if (Auth::user()->id == $producto->id_vendedor)
                    <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAkFBMVEX///8AAAD8/PwXFxfz8/PZ2dkXFxn5+fn//f4PDw++vr4TExUTExMWFhbl4uXFxcW4t7cWERMZFBjh4eGRkZGpqak3NzdHR0dnZ2kICAvNzc8mJybu7u54eHiBgYGcnJxcW1yKiopOTk+np6iysrIIAAghISE1NDVlZWVxcXEeHB0/PT4oJSYsLSxLS0wEBwbhyXj/AAAEtElEQVR4nO3ZDXOaShQG4D0ruHxoEcHoIgpG42eM///f3XMWTG+Te9vEdibFeZ/OZATZDOd1ObuxSgEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADAG9r5vfF/7m7+Dq6i26v6vdF/KV0ulovy5uEZj/b+4O38FXRGRLdn4vPoe8tEK8kku3m8T717yCRw/660F0WReXfRD60zePPWvw7eZvLjpZ0R8H37UVQYV512VWj3ukyipJRXWhv+EQR+VHhyzG/4zWCtAqOMHyWZO3jNREYXSVG63949Rk12/LzQsTLyiWf0fCzl08/2cpZm7kEahceDL5fZjTILOf+QKKP1/JnK0bMcnyL+Td/nSTJ1o2v/S2u7UWD2FFouNqaaiwwyirnHajUiG3JRA6LEHYXTo7XhMKZkT9bG/ZB4ZikeuqIwtMNeSDlf12SiVU6Wr0gHljZdXJsPXHe9Xu9pSLU2PE/6VGpV8OE536y2dkC+4Uy46OP+RP04tnSaPfPxIw+26ZiDe5ydaTCk6HWeTOTy035HYY8j7ZyC0ua2R3ZII6W+0ZjKIDjHdJCz5UtsufgR9S81F1vRsU8TfuAerUwnziSlWp6uEYdyvmZS2jg+F3w2CgeDeffmyf6Ja+Tbztbbvn25ZlJQfJJ260W17ZPPJY/5J7fa5zieSgstSE4rO053Wlqy2nAaRZvJmt+UoIxK+Djp2m7fbFMuIstPRNw+HrwmE+4HtFbeiNus5V4z4kzSnqw9qra0kExKLptnwlPaNAx+6yHkIU0mtbUH6cD8KE5DWn51jZ9VUprmD26NOOU+f7JNJosnu5i5s/1DYuTRSLdKSp/ZpkbTZMIPnt820f2FVm0mp5jjaSx55fqi0m7m2XFfSp9WmQqKQ9ZmsqS+lUAWCU+iqvp5Jo1aVp4mk2nsFiHZyhzocvi66m50isfxSyVPf8khXOfJhBeY3UJmiOLdyEYymav/yORp3FTPo3mBmrSZLHjllt2K1l5vQFXHVmPZScTj0m08V3SZqaDpsdIuKt68yN8/MX37SSbjdqIcOI2szUQ6a+XOLt3ZrvHSOHzg6sol70j867rDxRyp4m37aBtLCO8y8V4zCanKyuSRj/fXtVhPLz06FFlR82H3Hh3ehXOXpTPv2+WzNddMzJSLjHdHniU7o5tMtMvEtvMkbjO5yHaXwn4YZq+ZZGR7cpaj2ZbdenIayZHCQRjK6qtlnvRlb6/Lmjf3crYutWRCQ+3WYpK1WOYJtf2kmvNudWjp7Lu9Pbm9vf9Al8FwcKFpJyMxyqumx+Mpz7RsKdzenp8S3m8d5r35LHHNsljluZaOO1nlGzcqz1eZyyQx+Wm4fVkbuTBb5StPmqvZ7Ofb3T5Snfx+1t2yNu3rwG8yabz7IuVtfZxJpJrvUPS767R68+1Kh3y/d35kDhRv2yi0/mVJTSa62d7fJc0Nl6fJ4uMj2nlyz3QiW1rv/XeP/4fkj6G7prW/rIpP/A+NLvyikwvLx2n37ePHZwmHZ+61j7z6fH33nggAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMBd+AdZ4kFp8h/VlAAAAABJRU5ErkJggg=="  alt="...">
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
                                            <input hidden type="text" name="email" id="email" value="{{ Auth::user()->email }}">
                                            <input hidden type="text" name="name" id="name" value="{{ Auth::user()->name }}">
                                            <input hidden type="text" name="publicar" id="publicar" value="1">
                                            <input type="submit"class="btn btn-primary btn-md" value="Publicar">
                                        </form>
                                    </div>
                                @elseif ($producto->estado_producto == True && $producto->stock_producto >=1)                                        
                                    <div  class="col md-2">
                                        <form action="{{url('/producto/'.$producto->id)}}" method="post">
                                            @csrf
                                            
                                            {{method_field('PATCH')}}
                                            <input type="number" hidden name="estado_producto" id="estado_producto" value="0">
                                            <input hidden type="text" name="email" id="email" value="{{ Auth::user()->email }}">
                                            <input hidden type="text" name="name" id="name" value="{{ Auth::user()->name }}">
                                            <input hidden type="text" name="publicar" id="publicar" value="0">
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
                                                <input hidden type="text" name="email" id="email" value="{{ Auth::user()->email }}">
                                                <input hidden type="text" name="name" id="name" value="{{ Auth::user()->name }}">
                                                <input class="btn btn-danger btn-md" onclick="return confirm('Desea borrar?')" type="submit" value="Eliminar">
                                            </div>
                                        
                                         </form>
                                    </div>
                            </div>
                        
                        </div>
                    </div>
                @endif
                    
                @endforeach
        </div>
    </div>

@endsection
