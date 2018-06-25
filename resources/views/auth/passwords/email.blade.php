@extends('layouts.master') @section('title', 'Recuperar contraseña')

@section('content')
<div class="container recuperar">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h2>Recuperar contraseña</h2>
                </div>

                <div class="panel-body">
                    <p></p>
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" value="{{ old('email') }}" required>

                              @if ($errors->has('email'))
                              <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                              </span>
                              @endif
                            </div>
                          </div>

                          <div class="col-md-4 col-md-offset-4">
                            <div class="form-group">
                              <button type="submit" class="btn btn-primary">
                                Enviar enlace
                              </button>
                            </div>
                          </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
