<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class Login extends Controller
{
    public function login(Request $request){
        $data = $request->all();
        $usuarios = Usuario::where('email', '=' , $data['email'])->
                             where('password','=', $data['password'])->
                             first();
                             if(!$usuarios){
                                return response([
                                    'message' => 'No se encontre el usuario'
                                ], 404 );
                             }

                             //return response([
                                    //'message'=>'login hecho'
                             //],200);

                             $request->validate([
                                'email' => 'required|email',
                                'password' => 'required|string'
                            ]);

                            $token = $usuarios-> createToken('token-user')->plainTextToken;

                            return response([
                                'usuarios'=>$usuarios,
                                'token'=>$token
                            ]);


    }
}


