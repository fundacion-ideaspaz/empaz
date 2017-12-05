@extends('layouts.master') @section('title', 'Eliminar Indicador') @section('content')
<div class="row">
  <div class="card col-12">
    <div class="card-body">
      @if(!$can_delete)
      <h2>No se puede eliminar este indicador</h2>
      <div class="form-group">
        <label for="confirm">Este indicador no puede ser eliminado porque pertenece a un cuestionario.
        </label>
      </div>
      <div class="form-group">
        <a href="/indicadores" class="btn btn-primary">Regresar</a>
      </div>
      @else
      <h2>¿Eliminar Indicador?</h2>
      <form action="/indicadores/{{$id}}/delete" method="post" class="form">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="confirm">¿Seguro deseas eliminar esta indicador? De ser asi, da clic en el boton de abajo.</label>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-danger" value="Eliminar">
          <a href="/indicadores" class="btn btn-primary">Cancelar</a>
        </div>
      </form>
      @endif
    </div>
  </div>
</div>
@endsection