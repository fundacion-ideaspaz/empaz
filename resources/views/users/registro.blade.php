@extends('layouts.masterAnimation') @section('title', 'Crear Usuario') @section('content')
  <div class="fs-form-wrap" id="fs-form-wrap">
    <div class="fs-title">
      <h2>Crear Usuario</h2>
      </div>
      <form action="/registro" method="post" id="myForm" class="fs-form fs-form-full" autocomplete="off">
        {{ csrf_field() }}
        <input type="hidden" name="role" value="empresa" id="role" value="{{$role}}">
        <ol class="fs-fields">
        <li>
          <label for="nombre" class="fs-field-label fs-anim-upper">Nombre</label>
          <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="fs-anim-lower" required maxlength="191" title="Diligencie este campo para continuar">
        </li>
        <li>
          <label for="email" class="fs-field-label fs-anim-upper">Email</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" class="fs-anim-lower" required title="Diligencie este campo para continuar" oninvalid="this.setCustomValidity('Ingrese un correo válido')" oninput="this.setCustomValidity('')">
        </li>
        <li>
          <label for="password" class="fs-field-label fs-anim-upper">Contraseña</label>
          <input type="password" id="password" name="password" value="{{ old('password') }}" class="fs-anim-lower" required title="Diligencie este campo para continuar">
          <small id="passwordHelp" class="form-text text-muted">La contraseña debe tener al menos 8 caracteres.</small>
        </li>
        <li>
          <label for="password_confirmation" class="fs-field-label fs-anim-upper">Confirmación de la contraseña</label>
          <input type="password" id="password_confirmation" name="password_confirmation" class="fs-anim-lower" maxlength="191" required title="Diligencie este campo para continuar">
          <small id="passwordHelp" class="form-text text-muted">Digite la contraseña nuevamente.</small>
        </li>
        <li>
          <label for="cargo" class="fs-field-label fs-anim-upper">Cargo</label>
          <input type="text" name="cargo" value="{{ old('cargo') }}" id="cargo" class="fs-anim-lower" required title="Diligencie este campo para continuar">
        </li>
        <li>
          <label for="telefono" class="fs-field-label fs-anim-upper">Teléfono</label>
          <input type="tel" name="telefono" value="{{ old('telefono') }}" id="telefono" placeholder="Opcional" class="fs-anim-lower" title="Diligencie este campo para continuar">
        </li>

        </ol>
          <div class="fs-submit terminos">
            <div class="row">
            <div class="col-sm-1">
              <input type="checkbox" name="terminos" value="terminos" oninvalid="this.setCustomValidity('Debe aceptar los términos para continuar su registro.')" oninput="this.setCustomValidity('')" required>
            </div>
            <div class="col-sm-11">
            <p>Al registrarse usted está aceptando los términos y condiciones de uso de la plataforma y el aviso de privacidad de protección de datos personales. <a href="/pdfs/TerminosCondicionesEMPAZ.pdf" target="_blank">Ver aquí</a>.</p>
          </div>
        </div>
          </div>
          <button class="fs-submit" type="submit" class="btn btn-primary" value="Guardar">Guardar</button>
          @if ($errors->any())
          <div class="alert alert-danger empre">
              @foreach ($errors->all() as $error)
                {{ $error }}<br>
              @endforeach
          </div>
          @endif
      </form>
    </div>
@endsection
