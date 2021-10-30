@extends('layouts.base')

<div class="Container mt-1">
    @section('title', 'User List')

    @section('content')
        <div  class="row justify-content-center">
            <div class="col-md-10">

                <a href="/">
                    <br>
                    <img src="https://umgnaranjo.com/wp-content/uploads/2018/11/logo.png" width="100" height="95" class="rounded mx-auto d-block" alt="...">
                    <br>
                </a>
                <h2 class="text-center mb-5">Usuarios</h2>
                <!-- Seccion de alertas -->
                @if(session('usuarioEliminado'))
                    <div class="alert alert-success">
                        {{session('usuarioEliminado')}}
                    </div>
                @endif
                <table class="table table-bordered text-center">
                    <thead>
                    <tr class="bg-info text-white">
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Foto</th>
                        <th>id</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="">
                    @foreach($users as $user)

                        <tr>
                            <td>{{$user->nombre}}</td>
                            <td>{{$user->email}}</td>
                            <td class="border border-secondary" >
                                <!--se utiliza para llamar a la foto-->
                                <img src="{{ asset('storage').'/'.$user->foto}}" class="img-fluid img-thumbnail"  width="50px">
                            </td>
                            <td>{{$user->descripcion}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('editform', $user->id)}}">
                                        <i class="fas fa-pencil-alt btn btn-primary mr-5"></i>
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

    @endsection
</div>
