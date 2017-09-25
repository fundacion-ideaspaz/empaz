@extends('layouts.master') @section('title', 'Editar Pregunta') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
            <form action="/questions/{{$question->id}}" method="post" class="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nombre">Texto</label>
                    <input type="text" class="form-control" name="nombre" value="{{$question->nombre}}">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control">{{$question->descripcion}}</textarea>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="importancia">Tipo de Pregunta</label>
                    <br>
                    <input name="nivel_importancia" value="{{$question->tipo_pregunta}}" id="ex21" type="text" data-provide="slider" data-slider-ticks="[1, 2, 3, 4]"
                        data-slider-ticks-labels='["Bajo", "Medio", "Alto", "Muy Alto"]' data-slider-min="1" data-slider-max="5"
                        data-slider-step="1" data-slider-value="{{$question->tipo_pregunta_int()}}" data-slider-tooltip="hide"
                    />
                </div>
                <div class="form-group">
                    <label for="importancia">Indicadores</label>
                    <select name="indicadores[]" id="indicadores-select" multiple="multiple">
                        @foreach($indicadores as $indicador)
                        <option value="{{$indicador->id}}" selected>{{$indicador->nombre}}</option>
                        @endforeach
                        @foreach($restIndicadores as $indicador)
                        <option value="{{$indicador->id}}">{{$indicador->nombre}}</option>
                        @endforeach
                    </select>
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
</div>
<script>
    $(document).ready(function () {
        $('#indicadores-select').multiSelect()
    });

</script>
@endsection
