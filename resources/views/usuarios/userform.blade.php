@extends('layouts.base')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-5">
            

        <!--mensaje flash-->
         @if(session('usuarioGuardado'))
             <div class="alert alert-success">
                 {{ session('usuarioGuardado') }}
             </div>
         @endif

        <!--validacion errores-->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <div class="card">
                
                <form action="{{ url ('save') }}" method="POST">
                @csrf
                    <div class="card-header text-center">AGREGAR USUARIO</div>

                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-2">Nombre</label>
                            <input type="text" name="nombre" class="form-control col-md-9">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2">Email</label>
                            <input type="text" name="email" class="form-control col-md-9">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2">Rol</label>
                            <select name="rol" class="form-control col-md-9" >
                                <option value="">--Seleccione--</option>

                                @foreach( $rol as $roles)
                                    <option value="{{$roles->id_rol}}"> {{$roles->descripcion}}  </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-9 offset-2">Guardar</button>

                        </div>

                    </div>

                </form>
            </div>

        </div>

    </div>

    <a class="btn btn-primary btn-xs mt-5" href=" {{ url('/') }}">&laquo volver</a>

</div>