@extends('layouts.master') @section('title', 'Agregar Dimensiones - Cuestionario') @section('content')
<div class="row indicadores-form">
  <div class="card col-12">
    <div class="card-body">
      <h1>Agregar Dimensiones</h1>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="migas">{{$cuestionario->nombre}} / versión {{ $cuestionario->version }} </div>
      @if(sizeof($cuestionario->dimensiones) > 0)


      <h4>Dimensiones asignadas al cuestionario</h4>
      @endif
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Nombre</th>
            <th width="15%">Versión</th>
            <th width="10%">Acciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach($cuestionario->dimensiones as $dimension)
         <form action="/cuestionarios/{{$cuestionario->id}}/dimensiones/{{$dimension->id}}/delete" method="post" class="form" enctype="multipart/form-data">
         {{ csrf_field() }}
        <tr>
          <td><label>{{$dimension->nombre}}</label></td>
          <td><div class="input-group">
              <input class="form-control" value="{{$dimension->pivot->importancia}}" name="importancia" value="{{ old('importancia') }}" type="text" required/>
              <div class="input-group-addon">%</div>
            </div></td>
           <td><button class="btn btn-danger borrar" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>  
           </td> 
        </tr>        
        </form>
        @endforeach
        </tbody>
        </table>
     
      @if(sizeof($dimensiones) > 0)
      <h4>Dimensiones disponibles para ser asignadas</h4>
      @endif
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Nombre</th>
            <th width="15%">Versión</th>
            <th width="10%">Acciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach($dimensiones as $dimension)
        <form action="/cuestionarios/{{$cuestionario->id}}/dimensiones/{{$dimension->id}}" method="post" class="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <tr>
          <td><label>{{$dimension->nombre}}</label></td>
          <td>            <div class="input-group">
              <input class="form-control" name="importancia" value="{{ old('importancia') }}" type="text" required/>
              <div class="input-group-addon">%</div>
            </div></td>
            <td><button class="btn btn-primary editar" data-toggle="tooltip" data-placement="bottom" title="Agregar"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></td>
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