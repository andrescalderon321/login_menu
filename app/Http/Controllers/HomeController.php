<?php

namespace App\Http\Controllers;

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
        return view('administrador.home');
    }

    public function employees(){
        return view('administrador.Empleados');
    }

    public function inventories(){
        return view ('administrador.inventarios');
    }
    public function subscriber(){
        return view ('administrador.suscriptores');
    }
    public function food_menu(){
        return view ('administrador.menu_de_comidas');
    }

    public function orders(){
        return view ('administrador.pedidos');
    }

    public function suppliers(){
        return view ('administrador.provedores');
    }

    public function sale(){

        return view ('administrador.ventas');

    }
}
