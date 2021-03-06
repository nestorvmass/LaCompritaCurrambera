<?php

namespace App\Http\Controllers;

// use App\Mail\mailcontroller;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\support\Facades\Mail;

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InvitadosController;
use App\Mail\mailcontroller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;


class ProductoController extends Controller
{


    public function __construct()
    {
        $this->middleware('can:producto.create')->only('create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Se debe agregar la variable del usuario vendedor

        // $productos['productos'] = Producto::paginate(10);
       
        // return view('productos.index', $productos);
    
            // return response()->json($request);
        if($request->get('search')){
            $query = trim($request->get('search'));
            // return response()->json($query);
            $productos['productos'] =  Producto::where('nom_producto', 'LIKE', '%'.$query.'%')
            ->orderBy('nom_producto', 'asc')
            ->get();
            return response()->json($productos);
            return view('productos.index', $productos);


        }else{
            $productos['productos'] = Producto::paginate(20);
            return view('productos.index', $productos);
        }


        
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
        

        // $destinatario = request()->only('email');
        $destinatario = request()->only('email');
        $data = request()->except('_token');
        
        $productodata = request()->except('_token','email','name','id_vendedor');
        if($request->hasFile('imagen_producto')){
            // se debe modificar esto se debe agregar
            $file = $request->file('imagen_producto');
            $file_name = $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $file_name, 's3');
            // return response()->json($path);

            $productodata['imagen_producto'] = $path;
            
            // $productodata['imagen_producto']=$request->file('imagen_producto')->store('uploads', 'public');
            // $productodata['imagen_producto']=$request->file('imagen_producto')->store('uploads', 'public');
        }
        $productodata['id_vendedor'] = $data['id_vendedor']; // Pendiente el id del vendedor
        $productodata['estado_producto'] = False;
        // return response()->json($productodata);
        Producto::insert($productodata);
        // return response()->json($productodata);
        $data['create'] = 1;
        $correo = new mailcontroller($data);
        Mail::to($destinatario)->send($correo);
        return redirect('producto');
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
        $destinatario = request()->only('email');
        $data = request()->except('_token');
        $productodata = request()->except(['_token','_method','email','name', 'publicar']);
        // return response()->json($productodata);
        if($request->hasFile('imagen_producto')){
            // se debe modificar esto se debe agregar
            $file = $request->file('imagen_producto');
            $file_name = $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $file_name, 's3');
            // return response()->json($path);

            $productodata['imagen_producto'] = $path;
        }
        // return response()->json($data);
        Producto::where('id', '=',$id)->update($productodata);

        if( array_key_exists('publicar', $data)){
            $data['publicar'] = 1;
            $producto =  Producto::where('id',$id)->get();
            $id_vendedor1 = $producto[0]['id_vendedor'];
            $usuario= User::where('id', '=', $id_vendedor1)->get();

            // Data para enviar correo
            $destinatario = $usuario[0]['email'];
            $data['name'] = $usuario[0]['name'];

            $data['nom_producto'] = $producto[0]['nom_producto'];
            $data['precio_producto'] = $producto[0]['precio_producto'];
            $data['stock_producto'] = $producto[0]['stock_producto'];
        
            
            $correo = new mailcontroller($data);
            Mail::to($destinatario)->send($correo);
            

            // *****************
            // $producto =  Producto::where('id',$id)->get();
            // $data['publicar'] = 1;
            // $correo = new mailcontroller($data);
            // Mail::to($destinatario)->send($correo);

       }else{
            $data['update'] = 1;
            $correo = new mailcontroller($data);
            Mail::to($destinatario)->send($correo);
       }
        
        
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

        $data['delete'] = 1;
        $producto =  Producto::where('id',$id)->get();
        $id_vendedor1 = $producto[0]['id_vendedor'];
        $usuario= User::where('id', '=', $id_vendedor1)->get();

        // Data para enviar correo
        $destinatario = $usuario[0]['email'];
        $data['name'] = $usuario[0]['name'];

        $data['nom_producto'] = $producto[0]['nom_producto'];
        $data['precio_producto'] = $producto[0]['precio_producto'];
        $data['stock_producto'] = $producto[0]['stock_producto'];
      
        
        $correo = new mailcontroller($data);
        Mail::to($destinatario)->send($correo);
        Producto::destroy($id);
        return redirect('producto');
    }
}
