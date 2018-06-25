@extends('layouts.master') @section('title', 'Agregar Dimensiones') @section('content')
<div class="indicadores-form">
      <div class="card col-12">
      <div class="row">
        <div class="col-sm-9"><h2>Agregar Dimensiones</h2></div>
        <div class="col-sm-3 migas pull-right">{{$cuestionario->nombre}} / versión {{ $cuestionario->version }} </div>
      </div>
      <h4>Dimensiones asignadas</h4>
      @if(sizeof($cuestionario->dimensiones) > 0)

      @else
      <p>No tiene dimensiones asignadas a este cuestionario.</p>
      @endif
      <table class="table table-striped table-hover">
        <tbody>
        @foreach($cuestionario->dimensiones as $dimension)
         <form action="/cuestionarios/{{$cuestionario->id}}/dimensiones/{{$dimension->id}}/delete" method="post" class="form" enctype="multipart/form-data">
         {{ csrf_field() }}
        <tr>
          <td><label>{{$dimension->nombre}}</label></td>
          <td width="10%"><div class="input-group">
              <input class="form-control" value="{{$dimension->pivot->importancia}}" name="importancia" value="{{ old('importancia') }}" type="text" required/>
              <div class="input-group-addon">%</div>
            </div></td>
           <td width="10%"><button class="btn btn-danger borrar pull-right" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
           </td>
        </tr>
        </form>
        @endforeach
        </tbody>
        </table>

      <h4>Asignar dimensiones a cuestionario</h4>
      @if(sizeof($dimensiones) > 0)
      <table class="table table-striped table-hover">
        <tbody>
        @foreach($dimensiones as $dimension)
        <form action="/cuestionarios/{{$cuestionario->id}}/dimensiones/{{$dimension->id}}" method="post" class="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <tr>
          <td><label>{{$dimension->nombre}}</label></td>
          <td width = "10%">
            <div class="input-group">
              <input class="form-control" name="importancia" value="{{ old('importancia') }}" type="text" required oninvalid="this.setCustomValidity('Debe ingresar un valor válido')" title="Seleccione el nivel de importancia"/>
              <div class="input-group-addon">%</div>
            </div>
          </td >
          <td width="10%">
              <button class="btn btn-primary editar pull-right" data-toggle="tooltip" data-placement="bottom" title="Agregar">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
              </button>
            </td>
        </tr>
         </form>
      @endforeach
        </tbody>
        </table>
        @else
        <p>No hay dimensiones disponibles para asignar a este cuestionario.</p>
        @endif
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
<script>
  $(document).ready(function () {
    $('#dimensiones-select').multiSelect()
  });
</script> @endsection
