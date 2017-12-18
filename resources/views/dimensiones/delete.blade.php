@extends('layouts.master') @section('title', 'Crear usuario') @section('content')
<div class="row">
  <div class="card col-12">
    <div class="card-body">
      @if(!$can_delete)
      <h2>No se puede eliminar esta dimensión</h2>
      <div class="form-group">
        <label for="confirm">Esta dimensión no puede ser eliminada porque pertenece a un cuestionario.
        </label>
      </div>
      <div class="form-group">
        <a href="/dimensiones" class="btn btn-primary">Regresar</a>
      </div>
      @else
      <h2>¿Eliminar Dimensión?</h2>
      <form action="/dimensiones/{{$id}}/delete" method="post" class="form">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="confirm">¿Seguro deseas eliminar esta dimensión? De ser asi, da clic en el boton de abajo.</label>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-danger" value="Eliminar">
          <a href="/dimensiones" class="btn btn-primary">Cancelar</a>
        </div>
      </form>
      @endif
    </div>
  </div>
</div>
@endsection