@extends('layouts.masterAnimation') @section('title', 'Crear usuario') @section('content')
  <div class="fs-form-wrap" id="fs-form-wrap">
    <div class="fs-title">
      <h2>Crear Usuario</h2>
      </div>
      <form action="/registro" method="post" id="myform" class="fs-form fs-form-full" autocomplete="off">
        {{ csrf_field() }}
        <input type="hidden" name="role" value="empresa" id="role" value="{{$role}}">
        <ol class="fs-fields">
        <li>
          <label for="nombre" class="fs-field-label fs-anim-upper">Nombre</label>
          <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="fs-anim-lower" required>
        </li>
        <li>
          <label for="email" class="fs-field-label fs-anim-upper">Email</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" class="fs-anim-lower" required>
        </li>
        <li>
          <label for="password" class="fs-field-label fs-anim-upper">Contraseña</label>
          <input type="password" id="password" name="password" value="{{ old('password') }}" class="fs-anim-lower" required>
        </li>
        @if($role === 'empresa' || $role === 'experto')
        <li>
          <label for="cargo" class="fs-field-label fs-anim-upper">Cargo</label>
          <input type="text" name="cargo" value="{{ old('cargo') }}" id="cargo" class="fs-anim-lower" required>
        </li>
        @endif @if($role === 'empresa')
        <li>
          <label for="telefono" class="fs-field-label fs-anim-upper">Teléfono</label>
          <input type="tel" name="telefono" value="{{ old('telefono') }}" id="telefono" placeholder="opcional" class="fs-anim-lower">
        </li>

        </ol>
        @endif
          <div class="fs-submit terminos"><input type="checkbox" required  name="terminos" value="terminos"><p>Al registrarse usted está aceptando los términos y condiciones de uso de la plataforma. <a href="/terminos-condiciones-EMPAZ.pdf" target="_blank">Ver aquí</a></p></div>
          <button class="fs-submit" type="submit" class="btn btn-primary" value="Guardar">Guardar</button>
          <!-- <a href="/users" class="btn btn-default">Cancelar</a> -->
        @if ($errors->any())
        <div class="alert alert-danger empre">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      </form>
    </div>
@endsection
