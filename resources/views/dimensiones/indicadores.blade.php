@extends('layouts.master') @section('title', 'Agregar indicadores - Cuestionario') @section('content')
<div class="indicadores-form">
  <div class="row">
    <div class="col-sm-9"><h1>Agregar Indicadores</h1></div>
    <div class="col-sm-3 migas pull-right">{{$cuestionario->nombre}} / versión {{ $cuestionario->version }} </div>
  </div>
<h4>Indicadores asociados</h4>
      <table class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th width="40%">Dimensión</th>
            <th width="35%">Indicador</th>
            <th width="15%">Importancia</th>
            <th width="10%">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($dimensiones as $dimension) @foreach($dimension->indicadores($cuestionario->id) as $indicador)
          <tr>
            <td>{{$dimension->nombre}}</td>
            <td>{{$indicador->nombre}}</td>
            <?php
            $importance_array= ['1'=>'Baja',
                                '2' => 'Media',
                                '3' => 'Alta',
                                '4' => 'Muy Alta']; ?>
            <td>{{$importance_array[$indicador->nivel_importancia]}}</td>
            <td>
              <form action="/dimensiones/{{$dimension->id}}/indicadores/{{$indicador->id}}/delete" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="cuestionario_id" value="{{$cuestionario->id}}">
                <button class="btn btn-danger borrar pull-right" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
              </form>
            </td>
          </tr>
          @endforeach @endforeach
        </tbody>
      </table>


  <h4>Asociar indicadores a dimensiones</h4>
  <div class="form-group">
      <label for="dimension">Dimensión: </label>
      <select name="dimension" id="dimension" class="form-control">
        @foreach($dimensiones as $dimension)
          <option value="{{$dimension->id}}">{{$dimension->nombre}}</option>
          @endforeach
      </select>
  </div>
  <table class="table table-bordered table-hover table-striped">
    <label for="indicador">Indicadores: </label>
  @foreach($indicadores as $indicador)
  <form method="POST" action="/cuestionarios/{{$cuestionario->id}}/indicadores/{{$indicador->id}}" class="form-inline">
    <input type="hidden" name="dimension_id" id="dimension_field" value="1">
        {{ csrf_field() }}
        @if($indicadores->isNotEmpty())
          <tbody>
            @if(!$dimension->indicadores($cuestionario->id)->pluck("id")->contains($indicador->id))
            <tr>
            <td>
              {{$indicador->nombre}}
            </td>
            <td width="15%">
              <!-- <input name="nivel_importancia" class="slider-select" id="ex21" type="text" data-provide="slider" data-slider-ticks="[1, 2, 3, 4]"
            data-slider-ticks-labels='["Bajo", "Medio", "Alto", "Muy Alto"]' data-slider-min="1" data-slider-max="5" data-slider-step="1"
            data-slider-value="" data-slider-tooltip="hide" /> -->
            <select name="nivel_importancia" id="nivel_importancia" class="form-control" title="Seleccione el nivel de importancia">
                <option value="1">Baja</option>
                <option value="2">Media</option>
                <option value="3">Alta</option>
                <option value="4">Muy Alta</option>
            </select>
            </td>
            <td width="10%">
              <button class="btn btn-primary editar pull-right" data-toggle="tooltip" data-placement="bottom" title="Agregar">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
              </button>
            </td>
            </tr>
            @endif
          </tbody>
        </form>
        @endif
        @endforeach
      </table>
  <div class="form-group">
    <a class="btn btn-warning" href="/cuestionarios/{{$cuestionario->id}}/dimensiones">
      Atrás
    </a>
    <a class="btn btn-primary pull-right" href="/cuestionarios/{{$cuestionario->id}}/preguntas">
      Siguiente
    </a>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {

    $('#indicadores-select').multiSelect();

    $("#dimension").bind('change', function () {
        var cur_dimension_id = this.value;
        document.getElementById("dimension_field").value = String(cur_dimension_id);
        console.log($("#dimension_field"));
      });
    $('#dimension').trigger('change');


    });

</script> @endsection
