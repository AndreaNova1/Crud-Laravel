@extends('layouts.base')
@section('title', 'User Update')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-5">
            <!--Mensaje flash-->
            @if(session("usuarioModificado"))
                <div class="alert alert-success">
                    {{session("usuarioModificado")}}
                </div>
            @endif
        <!--Validacion de errores-->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <form action="{{ route('edit', $usuario->id)}}" method="POST">
                @csrf @method('PATCH')
                    <div class="card-header  text-center  p-3 mb-2 bg-info text-white">MODIFICAR USUARIO</div>

                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-4">Ingresa tu Nombre</label>
                            <input type="text" name="nombre" class="form-control col-md-7" value="{{ $usuario->nombre }}">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2">Email</label>
                            <input type="text" name="email" class="form-control col-md-9" value="{{ $usuario->email }}">
                        </div>

                        
                        <div class="row form-group">
                                <label for="" class="col-2">Rol</label>
                                <select name="rol_id" class="form-control col-md-9" >
                                    <option value="">--Selecione--</option>

                                    @foreach( $rol as $roles)
                                        <option value="{{$roles->id_rol}}"> {{$roles->descripcion}}  </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row form-group">
                                <button type="submit" class="btn btn-outline-success col-md-9 offset-2 p-3 mb-2 bg-success text-white">Modificar</button>

                            </div>

                    </div>

                </form>
            </div>

        </div>

    </div>

    @endsection
</div>
