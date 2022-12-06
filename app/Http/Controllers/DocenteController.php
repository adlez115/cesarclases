<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DocenteController;

class DocenteController extends Controller
{
    public function show($matricula){
        //$docente = DocenteController::where('matricula', $matricula)->first();
        $docente = DocenteController::find($matricula);
        return $docente;

    }
}
