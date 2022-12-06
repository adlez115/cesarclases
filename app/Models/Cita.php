<?php

namespace App\Models;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cita extends Model
{
    use HasFactory;

    public function usuario(){
        return $this->belongsTo(Usuario::class,'id_usuario','id');
    }
}
