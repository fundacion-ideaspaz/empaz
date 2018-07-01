@extends('layouts.master') @section('title', 'Respuestas Cuestionario') @section('content')
<div class="row">
  <div class="card col-12">
    <div class="card-body">
      <h2>{{$cuestionario->nombre}}</h2>

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
</div>
  @endsection
