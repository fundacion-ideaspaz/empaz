@extends('layouts.masterhome') @section('title', 'login')


@section('content')

<div class="modal {{ !$errors->has('auth') ? 'fade' : '' }}" id="exampleModal" data-keep-showing="{{ $errors->has('auth') }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
      <div class="col-md-5 derecha">
        <h3>Registrar nueva empresa</h3>
         <a href="/registro">Crear nueva empresa</a>
      </div>
      <div class="col-md-7">
      <h3>Ingresar</h3>
         <div class="panel panel-default">

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-10">
                              <i class="fa fa-user" aria-hidden="true"></i>
                                <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" value="{{ old('email') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-10">
                              <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                <input id="password" type="password" placeholder="Contraseña" class="form-control" name="password" value="{{ old('password') }}" required>
                            </div>
                        </div>

                        <div class="form-group" id="contentemail">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" value="{{ old('remember') }}" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                    </label>
                                </div>
                            </div>
                            @if ($errors)
                                <span class="help-block">
                                    <strong>{{ $errors->first() }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary">
                                    Ingresar
                                </button>

                                <a class="recuperarpass" style="color: #fff!important;" href="{{ route('password.request') }}">
                                    ¿Olvidó su contraseña?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div></div></div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('inlinejs')
  <script type="text/javascript">
    $(function () {
        $('*[data-keep-showing="1"]').modal('show').addClass('fade'); // Keep showing login modal when there are errors.
    });
  </script>
@endsection