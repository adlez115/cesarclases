<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CodigoController extends Controller
{
    public function codigoVerificacion(Request $request){
        $data = $request->all();

        $request->validate([
            'email' => 'required|string|email',
        ]);

        //validaciones
        $usuarios = Usuario::where('email', '=' , $data['email'])
        ->first();
        if(!$usuarios){
            return response([
                'message' => 'No se encontre el usuario'
            ], 404 );
         }
        $random = Str::random(10);
        $usuarios-> update(["codigo_verificacion"=>$random]);

            return response([
                'message'=>'se creo con exito el codigo de verificacion',
                'codigo_verificacion'=> $usuarios['codigo_verificacion']

            ], 201);

    }
}
