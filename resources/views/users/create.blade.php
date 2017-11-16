@extends('layouts.masterAnimation') @section('title', 'Crear usuario') @section('content')
<div class="container">
  <div class="fs-form-wrap" id="fs-form-wrap">
    <div class="fs-title">
      <h2>Crear Usuario</h2>
      </div>
      <form action="/users" method="post" id="myform" class="fs-form fs-form-full" autocomplete="off">
        {{ csrf_field() }}
        <input type="hidden" name="role" id="role" value="{{$role}}">
        <li>
          <label for="nombre" class="fs-field-label fs-anim-upper" >Nombre</label>
          <input type="text"  id="nombre" name="nombre" class="form-control fs-anim-lower" required>
        </li>
        <li>
          <label for="email" class="fs-field-label fs-anim-upper" >Email</label>
          <input type="email" id="email" name="email" class="form-control fs-anim-lower" required>
        </li>
        <li>
          <label for="password" class="fs-field-label fs-anim-upper" >Password</label>
          <input type="password" id="password" name="password" class="form-control fs-anim-lower" required>
        </li>
        @if($role === 'empresa' || $role === 'experto')
        <li>
          <label for="cargo" class="fs-field-label fs-anim-upper" >Cargo</label>
          <input type="text" name="cargo" id="cargo" class="form-control fs-anim-lower" required>
        </li>
        @endif
        @if($role === 'empresa')
        <li>
          <label for="telefono" class="fs-field-label fs-anim-upper" >Telefono</label>
          <input type="tel" name="telefono" id="telefono" class="form-control fs-anim-lower" required>
        </li>
        @endif
        <li>
          <input type="submit" class="btn btn-primary" value="Guardar">
          <a href="/users" class="btn btn-default">Cancelar</a>
        </li>
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
@endsection