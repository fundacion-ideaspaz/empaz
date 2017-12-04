@extends('layouts.master') @section('title', 'Crear usuario') @section('content')
<div class="row">
  <div class="card col-12">
    <div class="card-body">
      <h2>¿Eliminar Dimension?</h2>
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
    </div>
  </div>
</div>
@endsection