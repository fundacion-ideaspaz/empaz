@extends('layouts.master') @section('title', 'Agregar Preguntas') @section('content')
<div class="preguntas-form">
  <div class="card col-12">
  <div class="row">
    <div class="col-sm-9"><h2>Agregar Preguntas</h2></div>
    <div class="col-sm-3 migas pull-right">{{$cuestionario->nombre}} / versión {{ $cuestionario->version }} </div>
  </div>

<h4>Preguntas asignadas</h4>

<?php
  $flag="f";
  foreach($indicadores as $indicador){
    foreach($indicador->preguntas($cuestionario->id) as $pregunta){
      if ($pregunta) {
        $flag = "t";
      }else{
        $flag = "f";
      }
    }
  }
 ?>

@if($flag === "t")
      <table class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th>Indicador</th>
            <th>Pregunta</th>
            <th>¿Requerida?</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($indicadores as $indicador) @foreach($indicador->preguntas($cuestionario->id) as $pregunta)
          <tr>
            <td width="20%">{{$indicador->nombre}}</td>
            <td width="55">{{$pregunta->nombre}}</td>
            <td width="15%">{{$pregunta->required == 1 ? 'Si' : 'No'}}</td>
            <td width="10%">
              <form action="/indicadores/{{$indicador->id}}/preguntas/{{$pregunta->id}}/delete" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="cuestionario_id" value="{{$cuestionario->id}}">
                <button class="btn btn-danger borrar pull-right" data-toggle="tooltip" data-placement="bottom" title="Eliminar">
                  <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
              </form>
            </td>
          </tr>
          @endforeach @endforeach
        </tbody>
      </table>
  @else
    <p>No tiene preguntas asignadas a este cuestionario.</p>
  @endif

<h4>Asginar preguntas a dimensiones</h4>

@if(count($preguntas)>0)
  <div class="form-group">
      <label for="indicador">Indicador: </label>
      <select name="indicador" id="indicador" class="form-control" value="{{old('indicador')}}">
        @foreach($indicadores as $indicador)
          <option value="{{$indicador->id}}">{{$indicador->nombre}}</option>
        @endforeach
      </select>
  </div>

  <table class="table table-bordered table-hover table-striped">
    <label for="indicador">Preguntas: </label>
      <tbody>
      @foreach($preguntas as $pregunta)
          <form method="POST" action="/cuestionarios/{{$cuestionario->id}}/preguntas/{{$pregunta->id}}" class="form-inline">
          {{ csrf_field() }}
          @if(!$indicador->preguntas($cuestionario->id)->pluck("id")->contains($pregunta->id))
            <input type="hidden" name="indicador_id" id="indicador_field">
              <tr>
                <td>{{$pregunta->nombre}}</td>
                <td width="15%"><select name="required" value="{{ old('required') }}" id="required" class="form-control">
                  <option value="true">Requerida</option>
                  <option value="false">Opcional</option>
                </select>
                </td>
                <td width="10%">
                  <button class="btn btn-primary editar pull-right" data-toggle="tooltip" data-placement="bottom" title="Agregar">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                  </button>
                </td>
              </tr>
            @endif
           </form>
      @endforeach
      </tbody>
      </table>
  @else
  <p>No hay preguntas disponibles para asignar a este cuestionario.</p>
  @endif
  <div class="form-group">
    <a class="btn btn-warning" href="/cuestionarios/{{$cuestionario->id}}/indicadores">
      Atrás
    </a>
    <a class="btn btn-primary pull-right" href="/cuestionarios/{{$cuestionario->id}}/preguntas/validate">
      Finalizar
    </a>
  </div>
</div>
</div>

<script>
  $(document).ready(function () {
      $('#preguntas-select').multiSelect();
      $("#indicador").bind('change', function () {
          var cur_indicador_id = this.value;
          document.getElementById("indicador_field").value = String(cur_indicador_id);
        });
      $('#indicador').trigger('change');
      });

  </script>
</script> @endsection
