<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/producto', function () {
//     return view('producto.index');
// });

// Route::get('/producto/create',[ProductoController::class,'index']); 

 Route::resource('producto',ProductoController::class);
 Route::get('/producto{id}',[ProductoController::class,'venderProducto']); 



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
