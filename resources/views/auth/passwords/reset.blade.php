@extends('layouts.master') @section('title', 'Recuperar Contraseña')

@section('content')
<div class="row container">
    <div class="card col-12">
      <div class="card-body col-sm-8 col-offset-2">
              <div class="fs-title">
                <h2>Recuperar contraseña</h2>
              </div>
                    <form class="form-horizontal" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-6 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" value="{{ $email or old('email') }}" required >
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-6 control-label">Nueva contraseña</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required>
                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-6 control-label">Confirmar nueva contraseña</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <span toggle="#password-confirm" class="fa fa-fw fa-eye field-icon toggle-password-confirm"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Recuperar contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<script type="text/javascript">
$(".toggle-password").click(function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
$(".toggle-password-confirm").click(function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>

@endsection
