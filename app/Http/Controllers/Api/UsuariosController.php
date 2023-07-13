<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuarios;

class UsuariosController extends Controller
{
    public function read(Request $request){

        $usuario = new Usuarios();

        if($request->query("id")){
            $info = $usuario->find($request->query("id"));
        }else{
            $info = $usuario->all();
        }      

        return  response()->json($info); 
        //
}

public function create(Request $request){

    $usuarios = new Usuarios();

    $usuarios->Nombres = $request->input("Nombres");
    $usuarios->Apellido = $request->input("Apellido");
    $usuarios->TipoIdentificacion = $request->input("TipoIdentificacion");
    $usuarios->Identificacion = $request->input("Identificacion");
    $usuarios->Telefono = $request->input("Telefono");
    $usuarios->Email = $request->input("Email");
    $usuarios->Profesion = $request->input("Profesion");
    $usuarios->Rol = $request->input("Rol");

    $usuarios->save();

    $message=["message" => "Registro Exitoso!!"];

    return response()->json($message);
}

public function update(Request $request){

    $idusuarios = $request->query("id");
    $usuarios = new Usuarios();
    $usuariosparticular = $usuarios->find($idusuarios);

    $usuariosparticular->Nombres = $request->input("Nombres");
    $usuariosparticular->Apellido = $request->input("Apellido");
    $usuariosparticular->TipoIdentificacion = $request->input("TipoIdentificacion");
    $usuariosparticular->Identificacion = $request->input("Identificacion");
    $usuariosparticular->Telefono = $request->input("Telefono");
    $usuariosparticular->Email = $request->input("Email");
    $usuariosparticular->Profesion = $request->input("Profesion");
    $usuariosparticular->Rol = $request->input("Rol");

    $usuariosparticular->save();
    $message=[
        "message" => "Actualizacion Exitoso!!",
        "idusuarios" => $request->query("id"),
    ];
    return $message;

}

public function delete(Request $request){

    $idusuarios = $request->query("id");
    $usuarios = new Usuarios();
    $usuariosparticular = $usuarios->find($idusuarios);

    $usuariosparticular->delete();

    $message=[
        "message" => "Eliminacion Exitoso!!",
        "idusuarios" => $request->query("id"),
    ];
    return $message;
}

}