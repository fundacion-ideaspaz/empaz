@extends('layouts.masterAnimationCues') @section('title', 'Crear Pregunta') @section('content')
<div class="container">

      <div class="fs-form-wrap" id="fs-form-wrap">
<div class="row indicadores-form">
      <h3>Responder cuestionario {{$cuestionario->nombre}}</h3>
      <form action="/responder/{{$cuestionario->id}}" method="post" class="form fs-form fs-form-full" enctype="multipart/form-data" id="myform" autocomplete="off">
      <ol class="fs-fields">
        {{ csrf_field() }}
        @foreach($cuestionario->allPreguntas($cuestionario->id) as $pregunta)
          @component('components/preguntafield',['pregunta' => $pregunta, 'cuest_id' => $cuestionario->id])
          @endcomponent
        @endforeach
        </ol>
        <div class="from-group">
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
  </div>
  </div>
  @endsection