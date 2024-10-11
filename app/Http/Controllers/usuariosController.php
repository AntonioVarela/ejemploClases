<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class usuariosController extends Controller
{
    //
    public function index() {
        $usuarios = User::all();
        return view ('crudUSuarios')->with('usuarios', $usuarios);
    }

    public function create(Request $request) {
        // dd($request);
        $nuevoUsuario = new User();
        $nuevoUsuario->name = $request->nombre;
        $nuevoUsuario->apellidoP = $request->apellidoP;
        $nuevoUsuario->apellidoM = $request->apellidoM;
        $nuevoUsuario->rol = $request->rol;
        $nuevoUsuario->clave = $request->clave;
        $nuevoUsuario->email = $request->email;
        $nuevoUsuario->password = $request->psw;
        $nuevoUsuario->save();
        return redirect()->back();
    }

    public function edit($id) {
        $usuario = User::find($id);
        return view('editarUsuarios')->with('usuario', $usuario);
    }

    public function delete($id) {
        $usuario = User::find($id);
        $usuario->delete();
        return redirect()->back();
    } 

}
