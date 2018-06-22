@extends('layouts.master') @section('title', 'Crear Usuario') @section('content')
<div class="container">
  <div class="fs-form-wrap" id="fs-form-wrap">
    <div class="fs-title">
      <h2>Crear Usuario</h2>
      </div>
      <form action="/users" method="post" id="myform" class="fs-form fs-form-full" autocomplete="off">
        {{ csrf_field() }}
        <input type="hidden" name="role" id="role" value="{{$role}}">
        <div class="form-group">
          <label for="nombre" >Nombre</label>
          <input type="text"  id="nombre" name="nombre" value="{{ old('nombre') }}" class="form-control" maxlength="191">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" maxlength="191">
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control" maxlength="191">
        </div>
        <div class="form-group">
          <label for="password_confirmation">Confirmación de la contraseña</label>
          <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" maxlength="191">
        </div>

        @if($role != 'empresa')
        <div class="form-group">
          <label for="organizacion">Organización</label>
          <select name="organizacion" id="organizacion" class="form-control">
            <option value="Fundación Ideas para la Paz" selected>Fundación Ideas para la Paz</option>
            <option value="Cámara de Comercio de Bogotá">Cámara de Comercio de Bogotá</option>
          </select>
        </div>
        @endif
        <div class="form-group">
          <label for="cargo">Cargo</label>
          <input type="text" name="cargo" value="{{ old('cargo') }}" id="cargo" class="form-control" maxlength="191">
        </div>
        @if($role === 'empresa')
        <div class="form-group">
          <label for="telefono">Teléfono</label>
          <input type="tel" name="telefono" value="{{ old('telefono') }}" id="telefono" class="form-control">
        </div>
        @endif
        <div class="form-group">
          <a href="/users" class="btn btn-warning">Atrás</a>
          <input type="submit" class="btn btn-primary pull-right" value="Guardar">
        </div>
      </form>
    </div>
  </div>
@endsection
