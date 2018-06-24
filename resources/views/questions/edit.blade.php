@extends('layouts.master') @section('title', 'Editar Pregunta') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
            <div class="fs-title">
                <h1>Editar pregunta</h1>
            </div>
            <form action="/preguntas/{{$pregunta->id}}" method="post" class="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                @if(!$canEditEstado)
                <div class="alert alert-warning">
                  <p>Esta pregunta se encuentra asociada un cuestionario, por tanto no puede ser desactivada.</p>
                </div>
                @endif
                <div class="form-group">
                    <label for="nombre">Texto</label>
                    <textarea type="text" rows="1.5" class="form-control" name="nombre">{{$pregunta->nombre}}</textarea>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="ckeditor" rows="10" cols="80" name="descripcion" id="descripcion" class="form-control">{{$pregunta->descripcion}}</textarea>
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    @if(!$canEditEstado)
                    <select name="estado" id="estado" class="form-control" readonly >
                        <option value="activo" {{$pregunta->estado === 'activo' ? "selected" : 'disabled' }}>Activo</option>
                        <option value="inactivo" {{$pregunta->estado === 'inactivo' ? "selected" : 'disabled' }}>Inactivo</option>
                    </select>
                    @else
                    <select name="estado" id="estado" class="form-control" >
                        <option value="activo" {{$pregunta->estado === 'activo' ? "selected" : '' }}>Activo</option>
                        <option value="inactivo" {{$pregunta->estado === 'inactivo' ? "selected" : '' }}>Inactivo</option>
                    </select>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tipo_respuesta">Tipo de Respuesta</label>
                    <br>
                    <select name="tipo_respuesta" id="tipo_respuesta" class="form-control">
                        <option value="tipo_1" {{ $pregunta->tipo_respuesta === 'tipo_1' ? 'selected': ''}}>Tipo 1</option>
                        <option value="tipo_2" {{ $pregunta->tipo_respuesta === 'tipo_2' ? 'selected': ''}}>Tipo 2</option>
                        <option value="tipo_3" {{ $pregunta->tipo_respuesta === 'tipo_3' ? 'selected': ''}}>Tipo 3</option>
                        <option value="tipo_4" {{ $pregunta->tipo_respuesta === 'tipo_4' ? 'selected': ''}}>Tipo 4</option>
                    </select>
                </div>
                <?php
                foreach ($pregunta->opcionesRespuestas as $opcion) {
                  $options[$opcion->number] = $opcion;
                }

                // Check if there are missing fields -->> Provisional
                if (count($options) === 4 && $opcion->number ===4) {
                  $status = "minus_two";
                } elseif (count($options) === 5 && $opcion->number ===5) {
                  $status = "minus_one";
                } else {
                  $status = "ok";
                }
                ?>
                @if($status === "ok")
                  @for($indexKey = 1; $indexKey < 6; $indexKey++)
                      <div class="form-group" id="respuesta_{{$indexKey}}">
                          @if(array_key_exists($indexKey, $options))
                          <label for="respuesta_{{$options[$indexKey]->number}}">Respuesta {{$options[$indexKey]->number != 5 ? $options[$indexKey]->number : "N/A"}}</label>
                          <textarea type="text" rows="1.5" name="respuestas[{{$options[$indexKey]->id}}]" class="form-control" >{{$options[$indexKey]->descripcion}}</textarea>
                          @else
                          <label for="respuesta_{{$indexKey}}">Respuesta {{ $indexKey}}</label>
                          <textarea type="text" rows="1.5" name="respuestas[{{'new_'. $indexKey}}]" class="form-control" placeholder="Digite la nueva respuesta"></textarea>
                          @endif
                      </div>
                  @endfor
                  <!-- Provisional -->
                @elseif($status === "minus_one")
                  @for($indexKey = 1; $indexKey < 6; $indexKey++)
                      <div class="form-group" id="respuesta_{{$indexKey}}">
                          @if(array_key_exists($indexKey, $options) && $indexKey<=3)
                          <label for="respuesta_{{$options[$indexKey]->number}}">Respuesta {{$options[$indexKey]->number != 5 ? $options[$indexKey]->number : "N/A"}}</label>
                          <textarea type="text" rows="1.5" name="respuestas[{{$options[$indexKey]->id}}]" class="form-control" >{{$options[$indexKey]->descripcion}}</textarea>
                          @elseif($indexKey ===4)
                          <label for="respuesta_{{$indexKey}}">Respuesta {{ $indexKey}}</label>
                          <textarea type="text" rows="1.5" name="respuestas[{{$options[$indexKey]->id}}]" class="form-control" placeholder="Digite la nueva respuesta"></textarea>
                          @elseif($indexKey ===5)
                          <label for="respuesta_{{$indexKey}}">Respuesta N/A</label>
                          <textarea type="text" rows="1.5" name="respuestas[{{$options[$indexKey]->id}}]" class="form-control">No aplica</textarea>
                          @endif
                      </div>
                  @endfor
                  <!-- Provisional -->
                @else
                  @for($indexKey = 1; $indexKey < 6; $indexKey++)
                  <div class="form-group" id="respuesta_{{$indexKey}}">
                      @if(array_key_exists($indexKey, $options) && $indexKey<=2)
                      <label for="respuesta_{{$options[$indexKey]->number}}">Respuesta {{$options[$indexKey]->number != 5 ? $options[$indexKey]->number : "N/A"}}</label>
                      <textarea type="text" rows="1.5" name="respuestas[{{$options[$indexKey]->id}}]" class="form-control" >{{$options[$indexKey]->descripcion}}</textarea>
                      @elseif($indexKey ===3)
                      <label for="respuesta_{{$indexKey}}">Respuesta {{ $indexKey}}</label>
                      <textarea type="text" rows="1.5" name="respuestas[{{$options[$indexKey]->id}}]" class="form-control" placeholder="Digite la nueva respuesta"></textarea>
                      @elseif($indexKey ===4)
                      <label for="respuesta_{{$indexKey}}">Respuesta {{ $indexKey}}</label>
                      <textarea type="text" rows="1.5" name="respuestas[{{$options[$indexKey]->id}}]" class="form-control" placeholder="Digite la nueva respuesta"></textarea>
                      @elseif($indexKey ===5)
                      <label for="respuesta_{{$indexKey}}">Respuesta N/A</label>
                      <textarea type="text" rows="1.5" name="respuestas[{{'new_'. $indexKey}}]" class="form-control">No aplica</textarea>
                      @endif
                  </div>
                  @endfor
                @endif

                <div class="from-group">
                    <a href="/preguntas" class="btn btn-warning">Atrás</a>
                    <input type="submit" class="btn btn-primary pull-right" value="Guardar">
                </div>

            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#indicadores-select').multiSelect();
        $("#tipo_respuesta").bind('change', function () {
            var respuestaTipo = this.value;
            if (respuestaTipo === "tipo_1") {
                $("#respuesta_4").css("display", "block");
                $("#respuesta_3").css("display", "block");
                $("#respuesta_4").attr("disabled", false);
                $("#respuesta_3").attr("disabled", false);
            }
            if (respuestaTipo === "tipo_2") {
                $("#respuesta_4").css("display", "none");
                $("#respuesta_3").css("display", "block");
                $("#respuesta_4 input").attr("disabled", true);
                $("#respuesta_3").attr("disabled", false);
            }
            if (respuestaTipo === "tipo_3") {
                $("#respuesta_4").css("display", "none");
                $("#respuesta_3").css("display", "none");
                $("#respuesta_4 input").attr("disabled", true);
                $("#respuesta_3 input").attr("disabled", true);
            }
            if (respuestaTipo === "tipo_4") {
                $("#respuesta_4").css("display", "none");
                $("#respuesta_3").css("display", "block");
                $("#respuesta_4 input").attr("disabled", true);
                $("#respuesta_3").attr("disabled", false);
            }
        });
        $('#tipo_respuesta').trigger('change');


    });
</script>
@endsection
