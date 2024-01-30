<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');    
});

Route::get('/empresas', function () {
    return view('empresa');    
});

Route::get('/empresas/{id}', function ($id) {
    return view('empresa-show', ['id'=> $id]);    
});

Route::get('/clientes', function () {
    return view('clientes');    
});

Route::get('/clientes/{id}', function ($id) {
    return view('cliente-show', ['id'=> $id]);    
});