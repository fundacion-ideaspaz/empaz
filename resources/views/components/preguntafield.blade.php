<li data-input-trigger id="r-{{$pregunta->id}}">
<div class="row">
  <div class="col-sm-11">
    <label class="fs-field-label fs-anim-upper" for="respuesta-{{$pregunta->id}}">{{$index}}. {{$pregunta->nombre}}</label>
  </div>
  <div class="col-sm-1">
    <a class="descripcion tip info-cuestionario pull-right" data-placement="bottom" data-toggle="tooltip"><i class="fa fa-info-circle" aria-hidden="true"></i> <span>{!!$pregunta->descripcion!!}</span> </a>
  </div>
</div>
<!--   <a class="btn btn-sm btn-primary descripcion" data-placement="bottom" href="#" data-toggle="tooltip" data-html="true" title="<div class'tool'>{{$pregunta->descripcion}}</div>"><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
  <select  class="form-control pregunta-select cs-select cs-skin-boxes fs-anim-lower" name="{{$pregunta->id}}"
    id="respuesta-{{$pregunta->id}}" @if($pregunta->isRequired($cuest_id)) required @endif>
    <option value="">Por favor, seleccione la respuesta que más se acerca a la situación de su empresa</option>
    @foreach($pregunta->opcionesRespuestas as $opcion)
    @if(!($pregunta->isRequired($cuest_id) && $opcion->descripcion == 'No aplica'))
    <option value="{{$opcion->id}}">{{$opcion->descripcion}}</option>
    @endif
    @endforeach
  </select>
</li>
