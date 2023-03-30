<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CrudController extends Controller
{
    public function index(){
        $datos=DB::select(" select * from personas ");
        return view("welcome")->with("datos", $datos);
    }

    public function create(Request $request){
        try {
            $sql=DB::insert(" insert into personas(id, nombre, apellido, edad)values(?,?,?,?)",[
                $request->txtId,
                $request->txtNombre,
                $request->txtApellido,
                $request->txtEdad
            ]);
        } catch (\throwable $th){
            $sql=0;
        }
        if ($sql == true) {
            return back()->with("Correcto", "Usuario agregado correctamente");
        } else {
            return back()->with("Error", "Ha ocurrido un error al agregar el usuario");
        }
        
    }

}
