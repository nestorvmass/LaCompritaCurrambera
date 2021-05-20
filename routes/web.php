<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InvitadosController;
use App\Mail\mailcontroller;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



// Route::get('/producto', function () {
//     return view('productos.index');
// });


// Route::get('/producto/create', [ProductoController::class, 'create']);

Auth::routes();
Route::resource('/', InvitadosController::class);
Route::resource('producto', ProductoController::class)->middleware('auth');
// Route::resource('')

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');




Route::get('send', function(){
    $data['example'] = 1;
    $data['name']= "ejemplo";
    $correo = new mailcontroller($data);
    Mail::to('mass.nestor@gmail.com')->send($correo);
    return("Mensaje enviado");
});


