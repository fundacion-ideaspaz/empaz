<?php

$tipo_array = ["tipo_1" => "6",
              "tipo_2" => "5",
              "tipo_3" => "4",
              "tipo_4" => "5"];

$no_respuestas = $tipo_array[$pregunta->tipo_respuesta];
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

  <select  class="form-control pregunta-select cs-select cs-skin-boxes fs-anim-lower" name="{{$pregunta->id}}"
    id="respuesta-{{$pregunta->id}}" @if($pregunta->isRequired($cuest_id)) required @endif>
    <option value="">Por favor, seleccione la respuesta que más se acerca a la situación de su empresa</option>
    @for($idx_opcion = 1; $idx_opcion <= $no_respuestas; $idx_opcion++)
    <?php
    $opcion = $pregunta->opcionesRespuestas->where('number', "=", $idx_opcion)->first();
     ?>
     @if(!($pregunta->isRequired($cuest_id) && $opcion->number === 5))
        <option value="{{$opcion->id}}" >{{$opcion->descripcion}}</option>
     @endif
    @endfor
  </select>
</li>
