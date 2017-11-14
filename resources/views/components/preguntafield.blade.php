<div class="form-group">
  <label>{{$pregunta->nombre}}</label>
  <select class="form-control" name="{{$pregunta->id}}" id="respuesta-{{$pregunta->id}}">
    @foreach($pregunta->opcionesRespuestas as $opcion)
    <option value="{{$opcion->id}}">{{$opcion->descripcion}}</option>
    @endforeach
    <option value="-1">No hay información</option>
    <option value="-2">No aplica</option>
  </select>
</div>