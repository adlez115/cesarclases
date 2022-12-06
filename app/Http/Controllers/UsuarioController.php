<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\UsuarioController;

class UsuarioController extends Controller{
    public function crearUsuarios(Request $request){
    $data = $this->validateRequestCrear($request);



    //validaciones
    $usuarios = Usuario::create($data);
        return response([
            'message'=>'se creo con exito el usuario',
            'id'=> $usuarios['id']
        ], 201);
    }

    public function modificarUsuarios(Request $request, $id){
        $usuarios = Usuario::find($id);
        if(!$usuarios){
            return response([
                'message'=>'usuario no encontrado'
            ],404);
        }

        $data = $this->validateRequestModificar($request);

        $usuarios->update($data);

        return response([
            'message'=>'Se modifico el usuario'
        ]);
    }
    public function obtenerUsuarios($id){
        return 'Se obtubo un usuario'.$id;
    }
    public function eliminarUsuarios($id){
        $usuarios = Usuario::find($id);
        if(!$usuarios){
            return response([
                'message'=>'No encontrado'
            ],404);
        };

        $usuarios->delete();

        return response([
            'message'=>'Usuario Eliminado'
        ]);
    }

    public function obtenerAllUsuarios(){
        //$usuarios = Usuario::select('nombre','email')
        //->take(5)
        //->get();

        //seleccionar en usuarios donde la edad sea mayor a 0 o donde la edad sea menor a 18 y que se ordene con edad ascendente
        //$usuarios=Usuario::all();




        //$usuarios = Usuario::all();
        $usuarios = Usuario::with('citas')->get();
        return $usuarios;



       // public function obtener()
    //{
        //obtener todos los datos
        // $usuarios = Usuario::all();
        //paginacion de registros
        // $usuarios = Usuario::paginate(40);
        // $usuarios = Usuario::count();

        //get first
        // $usuarios = Usuario::where('edad', '>', 80)
        // ->orderBy('edad','asc')
        // ->orderBy('nombre','asc')
        // ->get();

        //obtener un solo usuario
        // $usuarios = Usuario::where('id', 10)->first();

        // $usuarios = Usuario::select('nombre', 'email')->take(5)->get();
        // $usuarios = Usuario::where('edad', '>', 0)
        //                    ->where('edad', '<', 18)
        //                    ->orderBy('edad','asc')
        //                    ->get();

        //$usuarios = Usuario::where('edad', '>', 0)
            //->orWhere('edad', '<', 18)
            //->orderBy('edad', 'asc')
            //->get();


        //return $usuarios;
    //}
    }

    public function obtener2Usuarios(){
        $usuarios = Usuario::paginate(2);
        return $usuarios;
    }

    public function validateRequestCrear(Request $request){
        return $request->validate([
            'nombre' => 'required|string',
            'email' => 'required|string|email|unique:usuarios',
            'password' => 'required|string|min:3',
            'edad' => 'nullable|numeric'
        ]);
        }

    public function validateRequestModificar(Request $request){
    return $request->validate([
        'nombre' => 'required|string',
        'email' => 'required|string|email',
        'password' => 'required|string|min:3',
        'edad' => 'nullable|numeric'
    ]);
    }


}

