<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvitadosController;
use App\Mail\mailcontroller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;


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
// Route::resource('/', InvitadosController::class);
// Route::resource('producto', ProductoController::class)->middleware('auth');

Route::get('producto', [ProductoController::class, 'index']);
Route::get('/', [ProductoController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::group(['middleware' =>'auth'], function(){
    Route::get('producto/create', [ProductoController::class, 'create']);
    // Ruta para almacenar en la base 
    Route::post('/producto', [ProductoController::class, 'store']);
    Route::get('/producto/{producto}/edit', [ProductoController::class, 'edit']);
    Route::patch('/producto/{producto}', [ProductoController::class, 'update']);
    Route::delete('/producto/{producto}', [ProductoController::class, 'destroy']);
    // Route::resource('admin', AdminController::class)->middleware('can:admin.index');
    Route::resource('admin', AdminController::class);

});



// Route::get('send', function(){
//     $data['example'] = 1;
//     $data['name']= "ejemplo";
//     $correo = new mailcontroller($data);
//     Mail::to('mass.nestor@gmail.com')->send($correo);
//     return("Mensaje enviado");
// });


