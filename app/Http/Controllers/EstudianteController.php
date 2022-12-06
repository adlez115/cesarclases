<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\EstudianteController;

class EstudianteController extends Controller
{
    public function obtenerEstudiantes(){
        $estudiantesbecah = Estudiante::where('genero','=','Male')
        ->Where('becado','=','true')
        ->count();

        $estudiantesbecaf = Estudiante::where('genero','=','Female')
        ->Where('becado','=','true')
        ->count();

        $estudiantesbecanoh = Estudiante::where('genero','=','Male')
        ->Where('becado','=','false')
        ->count();

        $estudiantesbecanof = Estudiante::where('genero','=','Female')
        ->Where('becado','=','false')
        ->count();

        $estudiantesregistroh = Estudiante::where('genero','=','Male')
        ->orderBy('fecha_de_inscripcion', 'asc')
        ->get();

        $estudiantesregistrof = Estudiante::where('genero','=','Female')
        ->orderBy('fecha_de_inscripcion', 'desc')
        ->get();
        return response([
            'total_masculinos_con_beca'=> $estudiantesbecah,
            'total_femeninos_con_beca'=> $estudiantesbecaf,
            'total_masculinos_sin_beca'=> $estudiantesbecanoh,
            'total_femeninos_sin_beca'=> $estudiantesbecanof,
            'masculinos_registrados'=> $estudiantesregistroh,
            'femeninos_registrados'=> $estudiantesregistrof
        ]);
    }
}
