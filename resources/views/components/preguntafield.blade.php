<li data-input-trigger>
  <label class="fs-field-label fs-anim-upper" for="respuesta-{{$pregunta->id}}">{{$pregunta->nombre}}</label>
  <select class="form-control" name="{{$pregunta->id}}"
    id="respuesta-{{$pregunta->id}}" @if($pregunta->isRequired($cuest_id)) required @endif>
    <option value="">Seleccione una opción...</option>
    @foreach($pregunta->opcionesRespuestas as $opcion)
    @if(!($pregunta->isRequired($cuest_id) && $opcion->descripcion == 'No aplica'))
    <option value="{{$opcion->id}}">{{$opcion->descripcion}}</option>
    @endif
    @endforeach
  </select>
</li> 