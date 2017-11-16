@extends('layouts.master') @section('title', 'Crear usuario') @section('content')
<div class="row">
  <div class="card col-12">
    <div class="card-body">
      <h2>Crear Usuario</h2>
      <form action="/registro" method="post" class="form">
        {{ csrf_field() }}
        <input type="hidden" name="role" id="role" value="{{$role}}">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" class="form-control" required>
        </div>
        @if($role === 'empresa' || $role === 'experto')
        <div class="form-group">
          <label for="cargo">Cargo</label>
          <input type="text" name="cargo" id="cargo" class="form-control" required>
        </div>
        @endif @if($role === 'empresa')
        <div class="form-group">
          <label for="telefono">Telefono</label>
          <input type="tel" name="telefono" id="telefono" class="form-control" required>
        </div>
        @endif
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