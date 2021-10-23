@extends('layouts.base')
//aca se muestran todas las consultas, es la vista
<div class="Container mt-5">
    <div  class="row justify-content-center">
        <div class="col-md-10">
        <a href="/">
                        <br>
                        <img src="https://umgnaranjo.com/wp-content/uploads/2018/11/logo.png" width="100" height="100" class="rounded mx-auto d-block" alt="...">
                        <br>
                    </a>
            <h2 class="text-center mb-5">Usuarios</h2>
            <a class="btn btn-success mb-4" href="{{url('/form')}}">Agregar usuarios</a>
            <!-- Mensaje Flash -->
            @if(session('usuarioEliminado'))
                <div class="alert alert-success">
                    {{session('usuarioEliminado')}}
                </div>
            @endif
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>id</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="">
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->nombre}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->descripcion}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('editform', $user->id)}}">
                                    <i class="fas fa-pencil-alt btn btn-primary mr-2"></i>
                                </a>

                                <form action="{{ route('delete', $user->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Desea eliminar el usuario?')" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $users->links() }}

        </div>
    </div>
</div>
