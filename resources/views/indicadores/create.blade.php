@extends('layouts.master') @section('title', 'Crear Dimension') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
            <h3>Crear Indicador</h3>
            <form action="/indicadores" method="post" class="form" enctype="multipart/form-data">
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
                    <label for="importancia">Nivel de importancia</label>
                    <br>
                    <input name="nivel_importancia" id="ex21" type="text" data-provide="slider" data-slider-ticks="[1, 2, 3, 4]" data-slider-ticks-labels='["Bajo", "Medio", "Alto", "Muy Alto"]'
                        data-slider-min="1" data-slider-max="5" data-slider-step="1" data-slider-value="1" data-slider-tooltip="hide"
                    />
                </div>
                <div class="form-group">
                    <label for="importancia">Dimensiones</label>
                    <select name="dimensiones[]" id="dimensiones-select" multiple="multiple">
                        @foreach($dimensiones as $dimension)
                        <option value="{{$dimension->id}}">{{$dimension->nombre}}</option>
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
        $('#dimensiones-select').multiSelect()
    });

</script>
@endsection