<?php

namespace App\Http\Controllers;

use App\Models\invitados;
use App\Models\Producto;
use Illuminate\Http\Request;

class InvitadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        
        if($request->get('search')){
            $query = trim($request->get('search'));
            // return response()->json($query);
            $productos['productos'] =  Producto::where('nom_producto', 'LIKE', '%'.$query.'%')
            ->orderBy('nom_producto', 'asc')
            ->get();
            return view('invitados.index', $productos);


        }else{
            $productos['productos'] = Producto::paginate(10);
            return view('invitados.index', $productos);
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
     * @param  \App\Models\invitados  $invitados
     * @return \Illuminate\Http\Response
     */
    public function show(invitados $invitados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\invitados  $invitados
     * @return \Illuminate\Http\Response
     */
    public function edit(invitados $invitados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\invitados  $invitados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invitados $invitados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invitados  $invitados
     * @return \Illuminate\Http\Response
     */
    public function destroy(invitados $invitados)
    {
        //
    }
}
