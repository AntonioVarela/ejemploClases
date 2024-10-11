@extends('layouts.app')

@section('content')
<div class="container">
    <form action="">
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$usuario->name}}">
            </div>
            <div class="mb-3">
                <label for="apellidoM" class="form-label">Apellido Materno</label>
                <input type="text" class="form-control" id="apellidoM" name="apellidoM" value="{{$usuario->apellidoM}}">
            </div>
            <div class="mb-3">
                <label for="clave" class="form-label">Clave</label>
                <input type="text" class="form-control" id="clave" name="clave" value="{{$usuario->clave}}" >
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="apellidoP" class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control" id="apellidoP" name="apellidoP" value="{{$usuario->apellidoP}}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>

                <input type="email" class="form-control" id="email" name="email" value="{{$usuario->email}}">
               
            </div>
            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                @if($usuario->rol != 'admin')
                <select name="rol" class="form-select" id="rol">
                    <option value="Profesor" @selected($usuario->rol == 'profesor')>Profesor</option>
                    <option value="Alumno" @selected($usuario->rol == 'alumno')>Alumno</option>
                </select>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-info">Modificar</button>
    </div>
    </form>
</div>
@endsection