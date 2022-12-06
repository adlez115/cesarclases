<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{   
    use HasFactory;

    protected $primaryKey = 'matricula';
    protected $keyType = 'string';
    public $incrementing = false;

}
