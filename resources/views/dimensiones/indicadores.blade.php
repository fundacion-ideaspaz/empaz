@extends('layouts.master') @section('title', 'Agregar Indicadores') @section('content')
<div class="row indicadores-form">
  <div class="card col-12">
    <div class="row">
      <div class="col-sm-9"><h2>Agregar Indicadores</h2></div>
      <div class="col-sm-3 migas pull-right">{{$cuestionario->nombre}} / versión {{ $cuestionario->version }} </div>
    </div>
    <h4>Indicadores asginados</h4>

    <?php
      $flag="f";
      foreach($dimensiones as $dimension){
        foreach($dimension->indicadores($cuestionario->id) as $indicador){
          if ($indicador) {
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
          <th width="35%">Dimensión</th>
          <th width="40%">Indicador</th>
          <th width="15%">Importancia</th>
          <th width="10%">Acciones</th>
        </tr>
      </thead>
          @foreach($dimensiones as $dimension)
          @foreach($dimension->indicadores($cuestionario->id) as $indicador)
            <tbody>
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
          </tbody>
        @endforeach
        @endforeach
      </table>

        @else
        <p>No tiene indicadores asignados a este cuestionario.</p>
        @endif

        <h4>Asignar indicadores a dimensiones</h4>
        @if(count($indicadores)>0)
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
          <tbody>
          @foreach($indicadores as $indicador)
          <form method="POST" action="/cuestionarios/{{$cuestionario->id}}/indicadores/{{$indicador->id}}" class="form-inline" onsubmit="DoSubmit();" id="#myForm">
                {{ csrf_field() }}
                    @if(!$dimension->indicadores($cuestionario->id)->pluck("id")->contains($indicador->id))
                    <input class="dimension-id" type="hidden" name="dimension_id" value="{{old('dimension_id')}}">
                    <tr>
                    <td>{{$indicador->nombre}}</td>
                    <td width="15%">
                    <select name="nivel_importancia" id="nivel_importancia" class="form-control" title="Seleccione el nivel de importancia">
                        <option value="1">Baja</option>
                        <option value="2">Media</option>
                        <option value="3">Alta</option>
                        <option value="4">Muy Alta</option>
                    </select>
                    </td>
                    <td width="10%">
                      <button type="submit" class="btn btn-primary editar pull-right" data-toggle="tooltip" data-placement="bottom" title="Agregar">
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
      <p>No hay indicadores disponibles para asignar a este cuestionario.</p>
      @endif
      <div class="form-group">
        <a class="btn btn-warning" href="/cuestionarios/{{$cuestionario->id}}/dimensiones">
          Atrás
        </a>
        <a class="btn btn-primary pull-right" href="/cuestionarios/{{$cuestionario->id}}/preguntas">
          Siguiente
        </a>
      </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {

    $('#indicadores-select').multiSelect();

    $("#dimension").bind('change', function () {
        var cur_dimension_id = this.value;
        $('.dimension-id').val(cur_dimension_id)
      });
    $('#dimension').trigger('change');

    });

</script> @endsection
