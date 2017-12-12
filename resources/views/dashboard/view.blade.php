@extends('layouts.master') @section('title', 'Crear Pregunta') @section('content')
<div class="row indicadores-form">
  <div class="card col-12">
    <div class="card-body">
      <h3>Responder cuestionario {{$cuestionario->nombre}}</h3>
      
        {{ csrf_field() }}
        @foreach($cuestionario->allPreguntas($cuestionario->id) as $key=>$pregunta)
          @component('components/preguntafilled',['pregunta' => $pregunta, 'cuest_id' => $cuestionario->id, 'respuesta' => $respuestas[$key]])
          @endcomponent
        @endforeach
        <div class="from-group">
          <a href='/dashboard' class="btn btn-primary pull-left">Regresar</a>
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
    </div>
  </div>
  @endsection