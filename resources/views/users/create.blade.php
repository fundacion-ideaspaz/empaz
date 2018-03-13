@extends('layouts.master') @section('title', 'Crear usuario') @section('content')
<div class="container">
  <div class="fs-form-wrap" id="fs-form-wrap">
    <div class="fs-title">
      <h2>Crear Usuario</h2>
      </div>
      <form action="/users" method="post" id="myform" class="fs-form fs-form-full" autocomplete="off">
       @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        {{ csrf_field() }}
        <input type="hidden" name="role" id="role" value="{{$role}}">
        <div class="form-group">
          <label for="nombre" >Nombre</label>
          <input type="text"  id="nombre" name="nombre" value="{{ old('nombre') }}" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control" required>
        </div>
        @if($role === 'empresa' || $role === 'experto')
        <div class="form-group">
          <label for="cargo">Cargo</label>
          <input type="text" name="cargo" value="{{ old('cargo') }}" id="cargo" class="form-control" required>
        </div>
        @endif
        @if($role === 'empresa')
        <div class="form-group">
          <label for="telefono">Teléfono</label>
          <input type="tel" name="telefono" value="{{ old('telefono') }}" id="telefono" class="form-control" required>
        </div>
        @endif
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Guardar">
          <a href="/users" class="btn btn-default">Cancelar</a>
        </div>
       
      </form>
    </div>
  </div>
@endsection