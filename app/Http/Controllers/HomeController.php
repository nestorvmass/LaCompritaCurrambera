<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\invitados;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $productos['productos'] = Producto::paginate(10);
        return view('invitados.index', $productos);
        // return view('invitados.index');
    }
}
