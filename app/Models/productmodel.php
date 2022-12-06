<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\productmodel;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class productmodel extends Authenticatable
{
    
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nombre',
        'cantidad',
        'precio',
        'descripcion'
    ];

}
