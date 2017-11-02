@extends('layouts.master') @section('title', 'Agregar Dimensiones - Cuestionario') @section('content')
<div class="row indicadores-form">
  <div class="card col-12">
    <div class="card-body">
      <h3>Agregar indicadores al dimension {{$dimension->nombre}}</h3>
      @foreach($dimension->indicadores as $indicador)
      <form action="/dimensiones/{{$dimension->id}}/indicadores/{{$indicador->id}}/delete" method="post" class="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
          <div class="col-sm-12">
            <label>{{$indicador->nombre}}</label>
          </div>
          <div class="col-sm-3">
            <div class="input-group">
              <input class="form-control" value="{{$dimension->pivot->importancia}}" name="importancia" type="text" required/>
              <div class="input-group-addon">%</div>
            </div>
          </div>
          <div class="col-sm-3">
            <button class="btn btn-danger">Eliminar</button>
          </div>
        </div>
      </form>
      @endforeach @foreach($indicadores as $indicador)
      <form action="/dimensiones/{{$dimension->id}}/indicadores/{{$indicador->id}}" method="post" class="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
          <div class="col-sm-12">
            <label>{{$indicador->nombre}}</label>
          </div>
          <div class="col-sm-5">
            <div class="input-group">
              <label for="importancia">Nivel de importancia</label>
              <input name="nivel_importancia" class="slider-select" id="ex21" type="text" data-provide="slider" data-slider-ticks="[1, 2, 3, 4]" data-slider-ticks-labels='["Bajo", "Medio", "Alto", "Muy Alto"]'
                data-slider-min="1" data-slider-max="5" data-slider-step="1" data-slider-value="1" data-slider-tooltip="hide"
              />
            </div>
          </div>
          <div class="col-sm-3">
            <button class="btn btn-primary">Agregar</button>
          </div>
        </div>
      </form>
      @endforeach
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
  </div>
</div>
<script>
  $(document).ready(function () {
    $('#indicadores-select').multiSelect()
  });
</script> @endsection