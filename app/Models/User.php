<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Indicamos explícitamente el nombre de la tabla en tu base de datos
    protected $table = 'usuario';

    // Indicamos que la llave primaria no se llama 'id', sino 'id_usu'
    protected $primaryKey = 'id_usu';

    // Desactivar autoincrement si id_usu no es numérico autoincremental (si es autoincremental déjalo en true)
    public $incrementing = true; 

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'rol',
        'estado',
        'fch_registro',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'fch_registro' => 'datetime',
            'password' => 'hashed',
        ];
    }
}