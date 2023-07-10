<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

    $cliente = new Usuarios();

    $cliente->Nombres = $request->input("Nombres");
    $cliente->Apellidos = $request->input("Apellido");
    $cliente->Tipo_identificacion = $request->input("Tipo identificacion");
    $cliente->Identificacion = $request->input("Identificacion");
    $cliente->Telefono = $request->input("Telefono");
    $cliente->Email = $request->input("Email");
    $cliente->Profesion = $request->input("Profesion");
    $cliente->Rol = $request->input("Rol");

    $cliente->save();

    $message=["message" => "Registro Exitoso!!"];

    return response()->json($message,Response::HTTP_CREATED);
}

public function update(Request $request){


    $idUsuario = $request->query("id");

    $usuario = new Usuarios();

    $usuario2 = $usuario->find($idUsuario);

    $usuario2->Nombres = $request->input("Nombres");
    $usuario2->Apellidos = $request->input("Apellido");
    $usuario2->Tipo_identificacion = $request->input("Tipo identificacion");
    $usuario2->Identificacion = $request->input("Identificacion");
    $usuario2->Telefono = $request->input("Telefono");
    $usuario2->Email = $request->input("Email");
    $usuario2->Profesion = $request->input("Profesion");
    $usuario2->Rol = $request->input("Rol");


    $usuario2->save();

    $message=[
        "message" => "Actualización Exitosa!!",
        "idUsuario" => $request->query("id"),
        "nameusuario"=>$usuario2->name
    ];

    return $message;
}

public function delete(Request $request){

    $idUsuario = $request->query("id");

    $usuario = new Usuarios();

    $usuario2 = $usuario->find($idUsuario);

    $usuario2->delete();

    $message=[
        "message" => "Eliminación Exitosa!!",
        "idUsuario" => $request->query("id"),
    ];

    return $message;}
}