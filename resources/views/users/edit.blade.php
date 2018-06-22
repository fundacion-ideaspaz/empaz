@extends('layouts.master') @section('title', 'Editar Usuario') @section('content')
<div class="row">
  <div class="card col-12">
    <div class="card-body">
      <h2>Editar Usuario</h2>
      <form autocomplete="off" action="/users/{{$user->id}}" method="post" class="form">
        {{ csrf_field() }}
        <input value="{{$role}}" type="hidden" name="role" value="{{ old('role') }}" id="role">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input value="{{$user->nombre}}" type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="form-control" maxlength="191">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input value="{{$user->email}}" type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" autocomplete="new-password" readonly>
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control" autocomplete="new-password" placeholder="********">
          <small id="passwordHelp" class="form-text text-muted">No es necesario cambiar la contraseña, al dejar este campo en blanco la contraseña no cambiará.</small>
        </div>
        <div class="form-group">
          <label for="password_confirmation">Confirmación de la contraseña</label>
          <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" maxlength="191" placeholder="********">
          <small id="passwordHelp" class="form-text text-muted">No es necesario confirmar la contraseña, al dejar este campo en blanco la contraseña no cambiará.</small>
        </div>
        @if($role != 'empresa')
        <div class="form-group">
          <label for="organizacion">Organización</label>
          <select name="organizacion" id="organizacion" class="form-control" value="{{ old('organizacion') }}">
            <option value="Fundación Ideas para la Paz" {{$user->organizacion === 'Fundación Ideas para la Paz' ? "selected" : '' }}>Fundación Ideas para la Paz</option>
            <option value="Cámara de Comercio de Bogotá" {{$user->organizacion === 'Cámara de Comercio de Bogotá' ? "selected" : '' }}>Cámara de Comercio de Bogotá</option>
          </select>
        </div>
        @endif
        <div class="form-group">
          <label for="cargo">Cargo</label>
          <input value="{{$user->cargo}}" type="text" name="cargo" value="{{ old('cargo') }}" id="cargo" class="form-control">
        </div>
        @if($role === 'empresa')
        <div class="form-group">
          <label for="telefono">Teléfono</label>
          <input value="{{$user->telefono}}" type="tel" name="telefono" value="{{ old('telefono') }}" id="telefono" class="form-control">
        </div>
        @endif
        <div class="form-group">
          <label for="role">Rol de usuario</label>
          <select name="role" value="{{ old('role') }}" id="role" class="form-control">
            <option value="superadmin" {{ $role === 'superadmin' ? 'selected': ''}} >Superadmin</option>
            <option value="empresa" {{ $role === 'empresa' ? 'selected': ''}} >Empresa</option>
            <option value="consulta" {{ $role === 'consulta' ? 'selected': ''}} >Consulta</option>
            <option value="experto" {{ $role === 'experto' ? 'selected': ''}} >Experto</option>
          </select>
          <small id="roleHelp" class="form-text text-muted">
            Al cambiar el rol, algunos campos correspondientes al nuevo rol podrian aparecer en blanco.
            Puedes actualizarlos editando nuevamente el usuario.
          </small>
        </div>
        <div class="form-group">
          <a href="/users" class="btn btn-warning">Atrás</a>
          <input type="submit" class="btn btn-primary pull-right" value="Guardar">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
