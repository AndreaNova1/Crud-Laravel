@extends('layouts.base')
@section('title', 'User Update')

@section('content')
    <div class="container ">
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
                    <form action="{{ route('edit', $usuario->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')
                        <div class="card-header  text-center  p-4 mb-2 bg-info text-white">MODIFICAR USUARIO</div>

                        <div class="card-body">


                            <div class="mb-3">
                                <label class="form-label">Ingresa tu Nombre</label>
                                <input type="text" name="nombre" class="form-control border border-info " value="{{ $usuario->nombre }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" name="email" class="form-control border border-info" value="{{ $usuario->email }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <input type="file" name="foto" class="form-control border border-info" value="{{ $usuario->foto }}">
                            </div>




                            <td>
                                <div  align="center">
                                    <img class="mb-2" src="{{ asset('storage').'/'.$usuario->foto}}" alt="" height="90">
                                    <br>
                                </div>
                            </td>

                            <div class="row form-group">
                                <label for="" class="col-2">Rol</label>
                                <select name="rol_id" class="form-control col-md-9" >
                                    <option value="">Seleccione el rol</option>

                                    @foreach( $rol as $roles)
                                        <option value="{{$roles->id_rol}}"> {{$roles->descripcion}}  </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row form-group">
                                <button type="submit" class="btn btn-outline-success col-md-4 offset-2  mb-2 bg-success text-white">Modificar</button>
                                <a  href=" {{ url('/') }}" class="btn bg-danger text-white col-md-3 offset-2" type="submit">Regresar</a>

                            </div>

                        </div>

                    </form>
                </div>

            </div>

        </div>

        @endsection
    </div>
