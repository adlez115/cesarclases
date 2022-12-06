<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VentaController extends Controller
{
    public function obtenerVenta(){
        $ventas = Venta::all();
        return response($ventas, 200);
    }

    public function obtener1($id){

        $ventas = Venta::find($id);
        if($ventas!=null){
            return response($ventas, 200);

        }

        return response('No se encontro el producto', 404);

    }



        public function crearVenta(Request $request){
        $data = $request->all();

        $request->validate([
            'id_usuario' => 'required|string',
            'id_producto' => 'required|string',
            'fecha_compra' => 'required|date'
        ]);

        //validaciones
        $ventas = Venta::create($data);
            return response([
                'message'=>'se creo con exito el usuario',
                'id'=> $ventas['id']
            ], 201);

    }

    public function modificarVenta(Request $request, $id){
        $ventas = Venta::find($id);
        if(!$ventas){
            return response([
                'message'=>'Venta no encontrada'
            ],404);
        }

        $data = $this->validateRequestModificar($request);

        $ventas->update($data);

        return response([
            'message'=>'Se modifico la venta'
        ]);
    }

    public function eliminarVenta($id){
        $ventas = Venta::find($id);
        if(!$ventas){
            return response([
                'message'=>'No encontrado'
            ],404);
        };

        $ventas->delete();

        return response([
            'message'=>'Venta Eliminada'
        ]);
    }



    public function validateRequestModificar(Request $request){
        return $request->validate([
            'id_usuario' => 'required|numeric',
            'id_producto' => 'required|numeric',
            'fecha_compra' => 'required|date'
        ]);
        }
}
