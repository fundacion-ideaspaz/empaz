@extends('layouts.master') @section('title', 'Agregar Dimensiones - Cuestionario') @section('content')
<div class="row preguntas-form">
  <div class="card col-12">
    <div class="card-body">
      <h3>Agregar preguntas al indicador {{$indicador->nombre}}</h3>
      @foreach($indicador->preguntas as $pregunta)
      <form action="/indicadores/{{$indicador->id}}/preguntas/{{$pregunta->id}}/delete" method="post" class="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
          <div class="col-sm-12">
            <label>{{$pregunta->nombre}}</label>
          </div>
          <div class="col-sm-12">
              <label for="required">¿Es requerida?</label>
          </div>
          <div class="col-sm-12">
              <select name="required" id="required" required class="form-control">
                <option value="true" {{$pregunta->pivot->required ? 'selected' : ''}}>Si</option>
                <option value="false" {{!$pregunta->pivot->required ? 'selected' : ''}}>No</option>
              </select>
          </div>
          <div class="col-sm-3">
            <button class="btn btn-danger">Eliminar</button>
          </div>
        </div>
      </form>
      @endforeach @foreach($preguntas as $pregunta)
      <form action="/indicadores/{{$indicador->id}}/preguntas/{{$pregunta->id}}" method="post" class="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>{{$pregunta->nombre}}:</label>
            <br>
            <label for="required">¿Es requerida?</label>
            <select name="required" id="required" required class="form-control">
                <option value="true">Si</option>
                <option value="false">No</option>
            </select>
        </div>
        <div class="form-group">
          <button class="btn btn-primary">Agregar</button>
        </div>
      </form>
      @endforeach
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
<script>
  $(document).ready(function () {
    $('#preguntas-select').multiSelect()
  });
</script> @endsection