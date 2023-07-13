<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Contactos;

class ContactosController extends Controller
{
    public function read(Request $request){

        $usuario = new Contactos();

        if($request->query("id")){
            $info = $usuario->find($request->query("id"));
        }else{
            $info = $usuario->all();
        }      

        return  response()->json($info);
    //
}

public function create(Request $request){

    $usuario = new Contactos();

    $usuario->Nombre = $request->input("Nombre");
    $usuario->Identificacion = $request->input("Identificacion");
    $usuario->Telefono = $request->input("Telefono");
    $usuario->Correo = $request->input("Correo");
    $usuario->Residencia = $request->input("Residencia");

    $usuario->save();

    $message=["message" => "Registro Exitoso!!"];

    return response()->json($message,Response::HTTP_CREATED);
}

public function update(Request $request){

    $idcontactos = $request->query("id");
    $usuarios = new Contactos();
    $contactosparticular = $usuarios->find($idcontactos);

    $contactosparticular->Nombre = $request->input("Nombre");
    $contactosparticular->Identificacion = $request->input("Identificacion");
    $contactosparticular->Telefono = $request->input("Telefono");
    $contactosparticular->Correo = $request->input("Correo");
    $contactosparticular->Residencia = $request->input("Residencia");

    $contactosparticular->save();
    $message=[
        "message" => "Actualizacion Exitoso!!",
        "idcontactos" => $request->query("id"),
    ];
    return $message;
}

public function delete(Request $request){

    $idcontactos = $request->query("id");
    $usuarios = new Contactos();
    $contactosparticular = $usuarios->find($idcontactos);

    $contactosparticular->delete();

    $message=[
        "message" => "Eliminacion Exitoso!!",
        "idcontactos" => $request->query("id"),
    ];
    return $message;
}
}

