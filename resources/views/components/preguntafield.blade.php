<div class="form-group">
  <label>{{$pregunta->nombre}}</label>
  <select class="form-control" name="{{$pregunta->id}}" id="respuesta-{{$pregunta->id}}">
    @foreach($pregunta->opcionesRespuestas as $opcion)
    @if(!($pregunta->isRequired($cuest_id) && $opcion->descripcion == 'No aplica'))
    <option value="{{$opcion->id}}">{{$opcion->descripcion}}</option>

    @endif
    @endforeach
  </select>
</div>