@extends('layouts.master') @section('title', 'Crear Pregunta') @section('content')
<div class="row indicadores-form">
  <div class="card col-12">
    <div class="card-body">
      <h3>Responder cuestionario {{$cuestionario->nombre}}</h3>
      <form action="/responder/{{$cuestionario->id}}" method="post" class="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        @foreach($cuestionario->preguntas as $pregunta)
          @component('components/preguntafield', ['pregunta' => $pregunta])
          @endcomponent
        @endforeach
        <div class="from-group">
          <input type="submit" class="btn btn-primary pull-left" value="Guardar">
          <input type="submit" class="btn btn-success pull-left" value="Enviar para evaluar">
          <input type="submit" class="btn btn-danger float-right" value="Limpiar respuestas">
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
  @endsection