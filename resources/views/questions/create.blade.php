@extends('layouts.master') @section('title', 'Crear Pregunta') @section('content')
<div>
    <div class="fs-form-wrap" id="fs-form-wrap">
        <div class="fs-title">
            <h1>Crear pregunta</h1>
        </div>
        <form action="/preguntas" method="post" class="form fs-form fs-form-full" id="myform" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
            <div class="form-group">
                <label for="nombre">Texto</label>
                <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="ckeditor" rows="10" cols="80" name="descripcion" id="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" value="{{ old('estado') }}" id="estado" class="form-control cs-select cs-skin-boxes fs-anim-lower">
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tipo_respuesta">Tipo de Respuesta</label>
                <br>
                <select name="tipo_respuesta" id="tipo_respuesta" class="form-control">
                    <option>Tipo de respuesta</option>
                    <option value="tipo_1">Tipo 1</option>
                    <option value="tipo_2">Tipo 2</option>
                    <option value="tipo_3">Tipo 3</option>
                    <option value="tipo_4">Tipo 4</option>
                </select>
            </div>
            <div class="form-group" id="respuesta_1">
                <label for="respuesta_1">Respuesta 1</label>
                <input type="text" name="respuestas[]" class="form-control" required>
            </div>

            <div class="form-group" id="respuesta_2">
                <label for="respuesta_2">Respuesta 2</label>
                <input type="text" name="respuestas[]" class="form-control" required>
            </div>

            <div class="form-group" id="respuesta_3">
                <label for="respuesta_3">Respuesta 3</label>
                <input type="text" name="respuestas[]" class="form-control" required>
            </div>

            <div class="form-group" id="respuesta_4">
                <label for="respuesta_4">Respuesta 4</label>
                <input type="text" name="respuestas[]" class="form-control" required>
            </div>

    </div>
    <div class="from-group">
        <input type="submit" class="btn btn-primary" value="Guardar">
    </div>
    
    </form>
</div>
<script>

    $(document).ready(function () {
        $('#indicadores-select').multiSelect();
        $("#tipo_respuesta").on('change', function () {
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
    });

</script> @endsection