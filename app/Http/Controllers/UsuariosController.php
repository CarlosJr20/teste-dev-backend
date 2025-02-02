<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use App\Http\Controllers\findOrFile;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UsuariosController extends Controller
{
   public function index()
   {
    $usuarios = Usuario::paginate(20);
   
    return view ('usuarios.list', ['usuarios' => $usuarios]);
   }
   public function new()
   {
    return view('usuarios.form');

   }
   public function add(Request $request)
   {
    $usuario = new Usuario;
    $usuario = $usuario->create($request->all());
    return Redirect::to('/usuarios');
   }

   public function edit($id)
   {
    $usuario = Usuario::findOrFail($id);
    return view ('usuarios.form', ['usuarios' => $usuario]);
   }

   public function update($id, Request $request)
   {
    $usuario = Usuario::findOrFail($id);
    $usuario->update($request->all());
    return Redirect::to('/usuarios');

   }

   public function delet($id)
   {
    $usuario = Usuario::findOrFail($id);
    $usuario->delete();
    return Redirect::to('/usuarios');
   }
}
