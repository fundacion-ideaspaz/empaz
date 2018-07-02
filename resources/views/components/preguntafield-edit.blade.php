<?php

$tipo_array = ["tipo_1" => "6",
              "tipo_2" => "5",
              "tipo_3" => "4",
              "tipo_4" => "5"];

$no_respuestas = $tipo_array[$pregunta->tipo_respuesta];
$letters = ["A", "B", "C", "D", "E", "F"];
 ?>

<li data-input-trigger id="r-{{$pregunta->id}}">
<div class="row">
  <div class="col-sm-11">
    <label class="fs-field-label fs-anim-upper" for="respuesta-{{$pregunta->id}}">{{$index}}. {{$pregunta->nombre}}</label>
  </div>
  <div class="col-sm-1">
    <a class="descripcion tip info-cuestionario pull-right" data-placement="bottom" data-toggle="tooltip"><i class="fa fa-info-circle" aria-hidden="true"></i> <span>{!!$pregunta->descripcion!!}</span> </a>
  </div>
</div>

  <select  class="form-control pregunta-select cs-select cs-skin-boxes fs-anim-lower" name="{{$pregunta->id}}" id="respuesta-{{$pregunta->id}}">
     <option value="">Por favor, seleccione la respuesta que más se acerca a la situación de su empresa</option>
     @for($idx_opcion = 1; $idx_opcion <= count($letters); $idx_opcion++)
         <?php
         $opcion = $pregunta->opcionesRespuestas->where('number', "=", $idx_opcion)->first();
         $set_diff = count($letters)-$no_respuestas;
         if ($pregunta->isRequired($cuest_id)){
           $minus = 2;
         } else {
           $minus = 1;
         }
         ?>
         @if($opcion->number<=$no_respuestas-2)
             <option value="{{$opcion->id}}" @if ($selected_opcion_id === $opcion->id) selected='selected' @endif>{{$letters[$idx_opcion-1]}}. {{$opcion->descripcion}}</option>
         @elseif(!$pregunta->isRequired($cuest_id) && $idx_opcion === 5)
             <option value="{{$opcion->id}}" @if ($selected_opcion_id === $opcion->id) selected='selected' @endif>{{$letters[$idx_opcion-$set_diff-1]}}. {{$opcion->descripcion}}</option>
         @elseif($idx_opcion === 6)
             <option value="{{$opcion->id}}" @if ($selected_opcion_id === $opcion->id) selected='selected' @endif>{{$letters[$idx_opcion-$set_diff-$minus]}}. {{$opcion->descripcion}}</option>
         @endif
     @endfor
  </select>
</li>
