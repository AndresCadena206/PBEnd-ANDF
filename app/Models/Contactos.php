<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
    use HasFactory;

    protected $table = "contactos";
    protected $primaryKey = "id";
    protected $fillable = ["Nombre","Identificacion","Telefono","Correo","Residencia"];
    
}

