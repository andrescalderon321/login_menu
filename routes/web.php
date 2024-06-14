<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use  Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/empleados',[HomeController::class,'employees'])->name('empleado');
Route::get('/home/inventarios',[HomeController::class,'inventories'])->name('inventario');
Route::get('/home/menu_comidas',[HomeController::class,'food_menu'])->name('menu');
Route::get('/home/pedidos',[HomeController::class,'orders'])->name('pedidos');
Route::get('/home/provedores',[HomeController::class,'suppliers'])->name('provedores');
Route::get('/home/suscriptores',[HomeController::class,'subscriber'])->name('suscriptores');
Route::get('/home/ventas',[HomeController::class,'sale'])->name('ventas');

