@extends('layouts.master') @section('title', 'Agregar Dimensiones - Cuestionario') @section('content')
<div class="row indicadores-form">
  <div class="card col-12">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-9"><h1>Agregar Dimensiones</h1></div>
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

      @if(sizeof($dimensiones) > 0)
      <h4>Dimensiones para asignar</h4>
      @endif
      <table class="table table-striped table-hover">
        <tbody>
        @foreach($dimensiones as $dimension)
        <form action="/cuestionarios/{{$cuestionario->id}}/dimensiones/{{$dimension->id}}" method="post" class="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <tr>
          <td><label>{{$dimension->nombre}}</label></td>
          <td width = "10%">
            <div class="input-group">
              <input class="form-control" name="importancia" value="{{ old('importancia') }}" type="text" required oninvalid="this.setCustomValidity('Debe ingresar un valor válido')"/>
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
