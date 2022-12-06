<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class productcontroller extends Controller
{
    public function obtenerProducto(){
        $productos = producto::all();
        return response($productos, 200);
    }

    public function obtener1($id){

        $productos = producto::find($id);
        if($productos!=null){
            return response($productos, 200);

        }

        return response('No se encontro el producto', 404);

    }



        public function crearProductos(Request $request){
        $data = $request->all();

        $request->validate([
            'nombre' => 'required|string',
            'cantidad' => 'required|numeric',
            'precio' => 'required|numeric',
            'descripcion' => 'required|string'
        ]);

        //validaciones
        $productos = producto::create($data);
            return response([
                'message'=>'se creo con exito el usuario',
                'id'=> $productos['id']
            ], 201);

    }

    public function modificarProducto(Request $request, $id){
        $productos = producto::find($id);
        if(!$productos){
            return response([
                'message'=>'producto no encontrado'
            ],404);
        }

        $data = $this->validateRequestModificar($request);

        $productos->update($data);

        return response([
            'message'=>'Se modifico el producto'
        ]);
    }

    public function eliminarProducto($id){
        $productos = producto::find($id);
        if(!$productos){
            return response([
                'message'=>'No encontrado'
            ],404);
        };

        $productos->delete();

        return response([
            'message'=>'Producto Eliminado'
        ]);
    }



    public function validateRequestModificar(Request $request){
        return $request->validate([
            'nombre' => 'required|string',
            'cantidad' => 'required|numeric',
            'precio' => 'required|numeric|min:3',
            'descripcion' => 'nullable|string'
        ]);
        }
}
