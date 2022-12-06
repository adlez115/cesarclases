<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CambiarPassController extends Controller
{
    public function cambiarpass(Request $request){
        $data = $request->all();

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:3',
        ]);

        //validaciones
        $usuarios = Usuario::where('email', '=' , $data['email'])
        ->where('codigo_verificacion','=', $data['codigo_verificacion'])
        ->first();
        if(!$usuarios){
            return response([
                'message' => 'No se encontro el usuario'
            ], 404 );
         }
        $newpass = $data['password'];
        $usuarios-> update(["password"=>$newpass]);
        $usuarios-> update(["codigo_verificacion"=> ""]);

            return response([
                'message'=>'se creo con exito la nueva contraseña',
                'Nueva contraseña'=> $usuarios['password']

            ], 201);

    }
}
