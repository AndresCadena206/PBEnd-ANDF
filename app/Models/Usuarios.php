<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $table = "usuarios";
    protected $primaryKey = "id";
    protected $fillable = ["Nombres","Apellido","Tipo identificacion","Identificacion","Telefono","Email","Profesion","Rol"];
}