<div class="form-group">
  <label>{{$pregunta->nombre}}</label>
  <select class="form-control pregunta-select" name="{{$pregunta->id}}" id="respuesta-{{$pregunta->id}}" disabled>
    @foreach($pregunta->opcionesRespuestas as $opcion)
    @if(!($pregunta->isRequired($cuest_id) && $opcion->descripcion == 'No aplica'))
    <option value="{{$opcion->id}}" @if($opcion->id === $respuesta->opcion_respuesta_id) selected @endif>
      {{$opcion->descripcion}}
    </option>
    @endif
    @endforeach
  </select>
</div>