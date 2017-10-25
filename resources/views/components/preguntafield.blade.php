<div class="form-group">
  <label>{{$pregunta->nombre}}</label>
  <select class="form-control" name="respuesta-{{$pregunta->id}}" id="respuesta-{{$pregunta->id}}">
    @foreach($pregunta->opcionesRespuestas as $opcion)
    <option value="$opcion->id">{{$opcion->descripcion}}</option>
    @endforeach
  </select>
</div>