<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hola {{$array['name']}}</h1>
    {{-- Creacion --}}
    @if(array_key_exists('create', $array))
    <p>Haz creado un producto exitosamente</p>
    <h2>Detalle del producto: </h2>
    <p>Nombre: {{ $array['nom_producto'] }}</p>
    <p>Precio: {{ $array['precio_producto'] }}</p>
    <p>Unidades disponibles: {{ $array['stock_producto'] }}</p>

    <p>Recuerda, aun tu producto no puede ser visto por el publico, debes ingresar a la plataforma y dirigirte a "mis productos" y darle publicar</p>
    {{-- Actualizacion --}}
    @elseif(array_key_exists('update', $array))
    <p>Haz actualizado un producto exitosamente</p>

    <h2>Detalle del producto: </h2>
    <p>Nombre: {{ $array['nom_producto'] }}</p>
    <p>Precio: {{ $array['precio_producto'] }}</p>
    <p>Unidades disponibles: {{ $array['stock_producto'] }}</p>

    <p>Recuerda, aun tu producto no puede ser visto por el publico, debes ingresar a la plataforma y dirigirte a "mis productos" y darle publicar</p>
    {{-- Eliminacion --}}
    @else
        Correo de ejemplo
    @endif

</body>
</html>