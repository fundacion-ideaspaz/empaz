@extends('layouts.master')

@section('title', 'Crear usuario')

@section('content')
  <h2>Crear Usuario</h2>
  <form action="/users" method="post" class="form">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="nombre">Nombre</label>
      <input type="text" id="nombre" name="nombre" class="form-control">
    </div>
    <div class="form-group">
      <label for="cargo">Cargo</label>
      <input type="text" id="cargo" name="cargo" class="form-control">
    </div>
    <div class="form-group">
      <label for="correo">Correo</label>
      <input type="email" id="correo" name="correo" class="form-control">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" class="form-control">
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Guardar">
    </div>
  </form>
@endsection