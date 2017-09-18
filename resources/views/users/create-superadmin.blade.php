@extends('layouts.master') @section('title', 'Crear usuario') @section('content')
<div class="row">
  <div class="card col-12">
    <div class="card-body">
      <h2>Crear Usuario</h2>
      <form action="/users/{{$role}}" method="post" class="form">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="correo">Correo</label>
          <input type="email" id="correo" name="correo" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Guardar">
          <a href="/users" class="btn btn-default">Cancelar</a>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      </form>
    </div>
  </div>
</div>
@endsection