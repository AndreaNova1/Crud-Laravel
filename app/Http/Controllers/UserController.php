<?php


namespace App\Http\Controllers;

use App\Models\Rol;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    //Lisatdo de Usuarios
    public function listar(){


        $users = DB::table('usuarios')
            ->join('rol', 'usuarios.rol_id', '=', 'rol.id_rol')
            ->select('usuarios.*', 'rol.descripcion')
            ->paginate(5);


        return view('usuarios.listar', compact('users'));
    }

    //Formulario de Usuario
    public function userform(){

        $rol=Rol::all();

        return view('usuarios.userform', compact('rol'));
    }

    //Guardar Usuarios
    public function save(Request $request){
        /* Validamos los campos */
        $validator = $this->validate($request, [
            'nombre'=> 'required|string|max:75',
            'email'=> 'required|string|max:45|email|unique:usuarios',
            'rol'=> 'required|string'
        ]);

        /* Guardamos en la Base de datos */
        Usuario::create([
            'nombre'=>$validator['nombre'],
            'email'=>$validator['email'],
            'rol_id'=>$validator['rol']
        ]);

        return back()->with('usuarioGuardado','Usuario Guardado');
    }

    //Eliminar Usuarios
    public function delete($id){
        Usuario::destroy($id);

        return back()->with('usuarioEliminado', 'Usuario Eliminado');
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
