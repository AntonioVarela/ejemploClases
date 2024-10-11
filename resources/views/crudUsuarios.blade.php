@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <p class="d-inline-flex gap-1">
  <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Agregar
  </a>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    <form action="{{route('usuarios.create')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido Paterno</label>
            <input type="text" class="form-control" id="apellidoP" name="apellidoP" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Apellido Materno</label>
            <input type="text" class="form-control" id="apellidoM" name="apellidoM" required>
        </div>
        <div class="mb-3">
            <label for="clave" class="form-label">Clave unica</label>
            <input type="text" class="form-control" id="clave" name="clave" required>
        </div>
        <div class="mb-3">
            <label for="rol" class="form-label">Rol</label>
            <select name="rol" id="rol" class="form-select">
                <option value="alumno">Alumno</option>
                <option value="profesor">Profesor</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="psw" class="form-label">Password</label>
            <input type="password" class="form-control" id="psw" name="psw" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
  </div>
</div>

<div class="row">
    <table>
        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Clave</th>
            <th>Rol</th>
            <th>Email</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name.''. $usuario->apellidoP.''. $usuario->apellidoM }}</td>
                    <td>{{ $usuario->clave }}</td>
                    <td>{{ $usuario->rol }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        <!-- <a href="/usuarios/editar/{{$usuario->id}}" class="btn btn-primary">Editar</a> -->
                        <a href="{{route('usuarios.edit',$usuario->id)}}" class="btn btn-primary">Editar</a>
                        <form action="{{route('usuarios.delete', $usuario->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            <input type="hidden" name="id" value="{{$usuario->id}}">
                        </form>
                    </td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
</div>
@endsection