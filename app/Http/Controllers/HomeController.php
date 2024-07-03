<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class HomeController extends Controller
{

    public function employees(){
        $datos=DB::select("SELECT * from employees;");
        return view('administrador.Empleados')->with("datos",$datos);
    }
    //para crear los registros de empleados

    public function create(Request $request)
    {
    //    el metodo try se utilza como una condicion el cual muestra un mensaje de error al registrar un empleado,si este no es registrado correctamente
        
                try{
                    $sql=DB::select('insert into employees(name,rol,email,telefono)values(?,?,?,?)',[
                       
                        
                        $request->txtnombre,
                        $request->txtrol,
                        $request->txtemail,
                        $request->txttelefono,
                     

                        ]);

                }catch(\Throwable $th){

                    $sql =1;

                }
          
        if($sql == false){
            return back()->with("correcto","Empleado fue regitrado exitosamente");
        }else{
            return back()->with("incorrecto","Error al registrar");
        }

    }

    public function update(Request $request){

        try{
            $sql=DB::update(" update employees set name=?, rol=?, email=?, telefono=? where id=? ",[
               
                $request->txtnombre,
                $request->txtrol,
                $request->txtemail,
                $request->txttelefono,
                $request->txtid

                ]);

        }catch(\Throwable $th){

            $sql =0;

        }
  
        if($sql == true){
            return back()->with("correcto","Empleado fue mofificado exitosamente");
        }else{
            return back()->with("incorrecto","Error al modificar");
        }

        

    }


    public function delete($id){

        try{
            $sql=DB::delete("delete from  employees where id=$id");
             

        }catch(\Throwable $th){

            $sql =0;

        }
  
        if($sql == true){
        return back()->with("correcto","Empleado fue eliminado exitosamente");
            }else{
        return back()->with("incorrecto","Error al eliminar ");
            
            }
        }
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

    // crud para empleados
   
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
