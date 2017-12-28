@extends('layouts.master') @section('title', 'Crear usuario') @section('content')
<div class="row">
  <div class="card col-12">
    <div class="card-body">
      <h2>Editar Usuario</h2>
      <form autocomplete="off" action="/users/{{$user->id}}" method="post" class="form">
        {{ csrf_field() }}
        <input value="{{$role}}" type="hidden" name="role" value="{{ old('role') }}" id="role">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input value="{{$user->nombre}}" type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input value="{{$user->email}}" type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" autocomplete="new-password">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control" autocomplete="new-password">
          <small id="passwordHelp" class="form-text text-muted">
            No necesitas cambiar la contraseña. Si dejas este campo en blanco, la contraseña no cambiara.
          </small>
        </div>
        @if($role === 'empresa' || $role === 'experto')
        <div class="form-group">
          <label for="cargo">Cargo</label>
          <input value="{{$user->cargo}}" type="text" name="cargo" value="{{ old('cargo') }}" id="cargo" class="form-control">
        </div>
        @endif
        @if($role === 'empresa')
        <div class="form-group">
          <label for="telefono">Telefono</label>
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
            Al cambiar el rol, algunos cambos correspondientes al nuevo rol podrian aparecer en blanco.
            Puedes actualizarlos editando nuevamente el usuario.
          </small>
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