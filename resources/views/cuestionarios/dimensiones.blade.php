@extends('layouts.master') @section('title', 'Crear Pregunta') @section('content')
<div class="row indicadores-form">
  <div class="card col-12">
    <div class="card-body">
      <h3>Agregar dimensiones al cuestionario {{$cuestionario->nombre}}</h3>
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
    $('#dimensiones-select').multiSelect()
  });
</script> @endsection