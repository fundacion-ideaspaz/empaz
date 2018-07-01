@extends('layouts.masterAnimationCues') @section('title', 'Responder Cuestionario') @section('content')

      <div class="fs-form-wrap r-cuestionario" id="fs-form-wrap">
      <div class="fs-title">
      <h3>Responder cuestionario {{$cuestionario->nombre}}</h3>
      </div>
      <form action="/responder/{{$cuestionario->id}}" method="post" class="form fs-form fs-form-full" enctype="multipart/form-data" id="cuestForm" autocomplete="off">
      {{ csrf_field() }}
      <?php
       ?>
      <ol class="fs-fields">
        @foreach($cuestionario->allPreguntas() as $index => $pregunta)
          @component('components/preguntafield',['pregunta' => $pregunta, 'cuest_id' => $cuestionario->id, 'index' => $index+1])
          @endcomponent
        @endforeach
      </ol>
      <div class="col-md-12 fs-submit">
          <a href="/responder/{{$cuestionario->id}}" class="btn btn-danger">Limpiar</a>
        @if(Auth::user()->role === 'superadmin' ||Auth::user()->role === 'experto')
          <a class="btn btn-warning" href="/responder">Volver</a>
        @endif
        @if(Auth::user()->role === 'empresa')
          <input type="submit" class="btn btn-primary" value="Guardar">
          <input type="submit" class="btn btn-success btn-small" value="Enviar">
        @endif
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

  @endsection
