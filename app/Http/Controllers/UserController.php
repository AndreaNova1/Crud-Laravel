<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    //permite listar los usuarios
    public function listar(){


        $users = DB::table('usuarios')
            ->join('rol', 'usuarios.rol_id', '=', 'rol.id_rol')
            ->select('usuarios.*', 'rol.descripcion')
            ->paginate(5);


        return view('usuarios.listar', compact('users'));
    }

    //formulario utilizado para los usuarios
    public function userform(){

        $rol=Rol::all();

        return view('usuarios.userform', compact('rol'));
    }

    //permite guardar los datos
    public function save(Request $request){
        //se utiliza para dar las validaciones
        $validator = $this->validate($request, [
            'nombre'=> 'required|string|max:75',
            'email'=> 'required|string|max:45|email|unique:usuarios',
            'foto'=>'required',
            'rol'=> 'required|string'
        ]);

        //almacenamos la fotografia en la carpeta indicada
        if($request->hasFile('foto')){
            $validator['foto']=$request->file('foto')->store('foto', 'public');
        }
        //su funcion es guardar los datos en la base de datos
        Usuario::create([
            'nombre'=>$validator['nombre'],
            'email'=>$validator['email'],
            'foto'=>$validator['foto'],
            'rol_id'=>$validator['rol']
        ]);

        return back()->with('usuarioGuardado','Usuario Guardado');
    }

    //Eliminar Usuarios
    public function delete($id){
        $usuario = Usuario::findOrFail($id);

        //se usa para borrar los datos de manera general
        if (Storage::delete('public/'.$usuario->foto)){

            Usuario::destroy($id);
        }

        return back()->with('usuarioEliminado', 'Usuario eliminado');
    }

    //Formulario Editar Usuarios
    public function editform($id){
        $usuario = Usuario::findOrFail($id);
        $rol=Rol::all();

        return view('usuarios.editform', compact('usuario', 'rol'));
    }

    public function edit(Request $request, $id){
        $dataUsuario = request()->except((['_token','_method']));

        //edita imagenes
        if($request->hasFile('foto')){

            $usuario = Usuario::findOrFail($id);
            Storage::delete('public/'.$usuario->foto);
            $datosUsuario ['foto'] = $request-> file('foto')->store('foto','public');
        };

        Usuario::where('id', '=', $id)->update($datosUsuario);

        return back()->with('usuarioModificado','Usuario Modificado');
    }

}

