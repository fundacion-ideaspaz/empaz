@extends('layouts.master') @section('title', 'Crear Pregunta') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
            <h3>Crear Pregunta</h3>
            <form action="/preguntas" method="post" class="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="tipo_respuesta">Tipo de Respuesta</label>
                    <br>
                    <select name="tipo_respuesta" id="tipo_respuesta" class="form-control">
                        <option value="tipo_1">Tipo 1</option>
                        <option value="tipo_2">Tipo 2</option>
                        <option value="tipo_3">Tipo 3</option>
                        <option value="tipo_4">Tipo 4</option>
                    </select>
                </div>
                <div class="form-group" id="respuesta_1">
                    <label for="respuesta_1">Respuesta 1</label>
                    <input type="text" name="respuestas[]" class="form-control">
                </div>
                <div class="form-group" id="respuesta_2">
                    <label for="respuesta_2">Respuesta 2</label>
                    <input type="text" name="respuestas[]" class="form-control">
                </div>
                <div class="form-group" id="respuesta_3">
                    <label for="respuesta_3">Respuesta 3</label>
                    <input type="text" name="respuestas[]" class="form-control">
                </div>
                <div class="form-group" id="respuesta_4">
                    <label for="respuesta_4">Respuesta 4</label>
                    <input type="text" name="respuestas[]" class="form-control">
                </div>
        </div>
        <div class="from-group">
            <input type="submit" class="btn btn-primary" value="Guardar">
        </div>
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
