@extends('layouts.masterAnimation') @section('title', 'Crear Pregunta') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="fs-form-wrap" id="fs-form-wrap">
            <h3>Crear Pregunta</h3>
            <form action="/preguntas" method="post" class="form fs-form fs-form-full" id="myform" enctype="multipart/form-data">
                {{ csrf_field() }}
                <ol class="fs-fields">

                <li>
                    <label class="fs-field-label fs-anim-upper" for="nombre">Nombre</label>
                    <input type="text" class="form-control fs-anim-lower" name="nombre">
                </li>

                <li >
                    <label class="fs-field-label fs-anim-upper" for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control fs-anim-lower"></textarea>
                    </textarea>
                </li>

                <li >
                    <label class="fs-field-label fs-anim-upper" for="tipo_respuesta">Tipo de Respuesta</label>
                    <br>
                    <select name="tipo_respuesta" id="tipo_respuesta" class="form-control cs-select cs-skin-boxes fs-anim-lower">
                        <option value="tipo_1">Tipo 1</option>
                        <option value="tipo_2">Tipo 2</option>
                        <option value="tipo_3">Tipo 3</option>
                        <option value="tipo_4">Tipo 4</option>
                    </select>
                </li>

                <li id="respuesta_1">
                    <label class="fs-field-label fs-anim-upper" for="respuesta_1">Respuesta 1</label>
                    <input type="text" name="respuestas[]" class="form-control fs-anim-lower">
                </li>

                <li id="respuesta_2">
                    <label class="fs-field-label fs-anim-upper" for="respuesta_2">Respuesta 2</label>
                    <input type="text" name="respuestas[]" class="form-control fs-anim-lower">
                </li>

                <li id="respuesta_3">
                    <label class="fs-field-label fs-anim-upper" for="respuesta_3">Respuesta 3</label>
                    <input type="text" name="respuestas[]" class="form-control fs-anim-lower">
                </li>

                <li  id="respuesta_4">
                    <label class="fs-field-label fs-anim-upper" for="respuesta_4">Respuesta 4</label>
                    <input type="text" name="respuestas[]" class="form-control fs-anim-lower">
                </li>
                </ol>
        </div>
            <button class="fs-submit" type="submit" value="Guardar"></button>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#indicadores-select').multiSelect()
        // Tipos de respuestas
        $("#tipo_respuesta").on("change", function(){
            var tipoRespuesta = this.value;
            if(tipoRespuesta === "tipo_1"){
                $("#respuesta_4").css("display", "block");
                $("#respuesta_3").css("display", "block");
                $("#respuesta_4").attr("disabled", "false");
                $("#respuesta_3").attr("disabled", "false");
            }
            if(tipoRespuesta === "tipo_2"){
                $("#respuesta_4").css("display", "none");
                $("#respuesta_3").css("display", "block");
                $("#respuesta_4").attr("disabled", true);
                $("#respuesta_3").attr("disabled", "false");                
            }
            if(tipoRespuesta === "tipo_3" || tipoRespuesta === "tipo_4"){
                $("#respuesta_4").css("display", "none");
                $("#respuesta_3").css("display", "none");
                $("#respuesta_4").attr("disabled", true);
                $("#respuesta_3").attr("disabled", true);
                
            }
        })
    });

</script>
@endsection
