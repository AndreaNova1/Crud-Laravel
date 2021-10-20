<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UserController extends Controller
{

    //Lisatdo de Usuarios
    public function listar(){
        $data['users'] = Usuario::paginate(5);

        return view('usuarios.listar', $data);
    }

    //Formulario de Usuario
    public function userform(){
        return view('usuarios.userform');
    }

    //Guardar Usuarios
    public function save(Request $request){

        $validator = $this->validate($request, [
            'nombre'=> 'required|string|max:255',
            'email'=> 'required|string|max:255|email|unique:usuarios'
        ]);

        $userdata = request()->except('_token');
        Usuario::insert($userdata);

        return back()->with('usuarioGuardado','Usuario Guardado');
    }

   //Eliminar usuarios
   public function delete($id){
       Usuario::destroy($id);

       return back()->with('usuariosEliminado', 'usuario eliminado');
   }

 
    //Formulario Editar Usuarios
    public function editform($id){
        $usuario = Usuario::findOrFail($id);

        return view('usuarios.editform', compact('usuario'));
    }

    //Edicion de Usuarios
    public function edit(Request $request, $id){
        $dataUsuario = request()->except((['_token','_method']));
        Usuario::where('id', '=', $id)->update($dataUsuario);

        return back()->with('usuarioModificado','Usuario Modificado');
    }


}

