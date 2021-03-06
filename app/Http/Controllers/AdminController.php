<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{   


    public function __construct()
    {
        $this->middleware('can:admin.index')->only('index');
        // $this->middleware('can:admin.index')->only('index');
        // $this->middleware('can:admin.index')->only('index');
        // $this->middleware('can:admin.index')->only('index');
        // $this->middleware('can:admin.index')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $usuarios['usuarios'] =  User::all();
        // return response()->json($usuarios);
        return view('admin.index', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.create');
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

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuario = User::find($id);
        return view('admin.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $config['status'] = 'Operaci??n exitosa';
        $config['class'] = 'alert alert-success';
                // return response()->json($request);
        $initialdata = request()->except(['_token','_method']);
        if($initialdata['confirm-password' ]== null && $initialdata['password'] == null){
            $initialdata = request()->except(['_token','_method', 'confirm-password', 'password' ]);
        }elseif($initialdata['confirm-password' ] != $initialdata['password'] ){
            $config['status'] = 'Error, al intentar actualizar, las contrase??as no coinciden.';
            $config['class'] = 'alert alert-danger';
            return redirect('admin')->with($config);
        }else if($initialdata['confirm-password' ] == $initialdata['password'] ){
            $initialdata = request()->except(['_token','_method', 'confirm-password' ]);
            $initialdata['password'] = bcrypt($request['password']);
            User::where('id', '=',$id)->update($initialdata);
            return redirect('admin')->with($config);
        }

        User::where('id', '=',$id)->update($initialdata);
        
        return redirect('admin')->with($config);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $producto =  User::where('id',$id)->get();
        $productos= Producto::where('id_vendedor', '=', $id)->count();
        // return response()->json($productos);
        if($productos >= 1){
            $config['status'] = 'No se puede Eliminar el usuario porque tiene productos creados';
            $config['class'] = 'alert alert-danger';
            return redirect('admin')->with($config);
        }elseif (Auth::user()->id == $id){
            $config['status'] = 'No Eliminar su mismo usuario';
            $config['class'] = 'alert alert-danger';
            return redirect('admin')->with($config);
        }
        User::destroy($id);
        return redirect('admin');
    }
}
