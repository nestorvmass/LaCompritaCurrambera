<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Se debe agregar la variable del usuario vendedor

        $productos['productos'] = Producto::paginate(5);
        return view('productos.index', $productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $productodata = request()->except('_token');
        $productodata['id_vendedor'] = 1; // Pendiente el id del vendedor

        if($request->hasFile('imagen_producto')){
            // se debe modificar esto se debe agregar
            $productodata['imagen_producto']=$request->file('imagen_producto')->store('uploads', 'public');
        }
        $productodata['estado_producto'] = False;
        Producto::insert($productodata);
        return response()->json($productodata);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $producto = Producto::find($id);
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $productodata = request()->except(['_token','_method']);
        // return response()->json($productodata);
        if($request->hasFile('imagen_producto')){
            // se debe modificar esto se debe agregar
            $productodata['imagen_producto']=$request->file('imagen_producto')->store('uploads', 'public');
        }
        Producto::where('id', '=',$id)->update($productodata);
        
        return redirect('producto');
    }
    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Producto  $producto
    //  * @return \Illuminate\Http\Response
    //  */
    // public function publicar(Request $request, $id)
    // {

    //     $productodata = request()->except(['_token','_method','precio_producto','stock_producto','desc_producto','id_vendedor']);
    //     if($request->hasFile('imagen_producto')){
    //         // se debe modificar esto se debe agregar
    //         $productodata['imagen_producto']=$request->file('imagen_producto')->store('uploads', 'public');
    //     }
    //     Producto::where('id', '=',$id)->update($productodata);
        
    //     return redirect('producto');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Producto::destroy($id);
        return redirect('producto');
    }
}
