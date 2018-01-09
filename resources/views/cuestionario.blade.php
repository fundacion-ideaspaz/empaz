@extends('layouts.masterAnimationCues') @section('title', 'Crear Pregunta') @section('content')

      <div class="fs-form-wrap r-cuestionario" id="fs-form-wrap">
      <div class="fs-title">
      <h3>Responder cuestionario {{$cuestionario->nombre}}</h3>
      </div>
      <form action="/responder/{{$cuestionario->id}}" method="post" class="form fs-form fs-form-full" enctype="multipart/form-data" id="myform" autocomplete="off">
      {{ csrf_field() }}
      <ol class="fs-fields">
        
        @foreach($cuestionario->allPreguntas($cuestionario->id) as $pregunta)
          @component('components/preguntafield',['pregunta' => $pregunta, 'cuest_id' => $cuestionario->id])
          @endcomponent
        @endforeach
        </ol>
        <div class="fs-submit">
          <input type="submit" class="btn btn-primary pull-left" value="Guardar">
          <input type="submit" class="btn btn-success pull-left" value="Enviar para evaluar">
          <input type="reset" class="btn btn-danger float-right" value="Limpiar respuestas">
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