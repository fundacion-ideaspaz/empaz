@extends('layouts.master') @section('title', 'Agregar Dimensiones - Cuestionario') @section('content')
<div class="row indicadores-form">
  <div class="card col-12">
    <div class="card-body">
      <h1>Agregar dimensiones</h1>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      @if(sizeof($cuestionario->dimensiones) > 0)
      <h4>Dimensiones asignadas al cuestionario</h4>
      @endif
      @foreach($cuestionario->dimensiones as $dimension)
      <form action="/cuestionarios/{{$cuestionario->id}}/dimensiones/{{$dimension->id}}/delete" method="post" class="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
          <div class="col-sm-12">
            <label>{{$dimension->nombre}}</label>
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
      @endforeach
      @if(sizeof($dimensiones) > 0)
      <h4>Dimensiones disponibles para ser asignadas</h4>
      @endif
      @foreach($dimensiones as $dimension)
      <form action="/cuestionarios/{{$cuestionario->id}}/dimensiones/{{$dimension->id}}" method="post" class="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
          <div class="col-sm-12">
            <label>{{$dimension->nombre}}</label>
          </div>
          <div class="col-sm-3">
            <div class="input-group">
              <input class="form-control" name="importancia" type="text" required/>
              <div class="input-group-addon">%</div>
            </div>
          </div>
          <div class="col-sm-3">
            <button class="btn btn-primary">Agregar</button>
          </div>
        </div>
      </form>
      @endforeach
      <div class="form-group">
          <a class="btn btn-warning" href="/cuestionarios/{{$cuestionario->id}}/edit">
            Atrás
          </a>
          <a class="btn btn-primary pull-right"
            href="/cuestionarios/{{$cuestionario->id}}/dimensiones/validate">
            Siguiente
          </a>
        </div>
      </div>
  </div>
</div>
<script>
  $(document).ready(function () {
    $('#dimensiones-select').multiSelect()
  });
</script> @endsection