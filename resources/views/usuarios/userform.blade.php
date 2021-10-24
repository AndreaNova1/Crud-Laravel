@extends('layouts.base')
@section('title', 'User Create')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Estilos de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <title>Pagina</title>
    
</head>
<body>

    <div class="container"> @yield('content')</div>
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
                    <div class="card-header text-center p-3 mb-2 bg-info text-white">AGREGAR USUARIO</div>

                    <div class="card-body ">
                        <div class="row form-group">
                            <label for="" class="col-2">Nombre</label>
                            <input type="text" name="nombre" class="form-control col-md-9">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2">Email</label>
                            <input type="text" name="email" class="form-control col-md-9">
                        </div>

                        <div class="row mb-3">
                            <div class="col-6 offset-3">
                                <div class="form-group">
                                    <label>Rol</label>
                                    <select name="rol" class="form-control" >
                                        <option value="">--Seleccione--</option>

                                        @foreach( $rol as $roles)
                                            <option value="{{$roles->id_rol}}"> {{$roles->descripcion}}  </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-9 offset-2">Guardar</button>

                        </div>

                    </div>

                </form>
            </div>

        </div>

    </div>

    
    @endsection
</div>
</body> 

</html>
