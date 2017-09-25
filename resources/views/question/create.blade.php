@extends('layouts.master') @section('title', 'Crear Pregunta') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
            <h3>Crear Indicador</h3>
            <form action="/questions" method="post" class="form" enctype="multipart/form-data">
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
                    <label for="importancia">Tipo de Pregunta</label>
                    <br>
                    <input name="tipo_pergunta" id="ex21" type="text" data-provide="slider" data-slider-ticks="[1, 2, 3, 4]" data-slider-ticks-labels='["Bajo", "Medio", "Alto", "Muy Alto"]'
                        data-slider-min="1" data-slider-max="4" data-slider-step="1" data-slider-value="1" data-slider-tooltip="hide"
                    />
                </div>
                <div class="form-group">
                    <label for="importancia">indicadores</label>
                    <select name="indicadores[]" id="indicadores-select" multiple="multiple">
                        @foreach($indicadores as $indicador)
                        <option value="{{$indicador->id}}">{{$indicador->nombre}}</option>
                        @endforeach
                    </select>
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
    });

</script>
@endsection
