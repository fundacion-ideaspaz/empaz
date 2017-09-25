@extends('layouts.master') @section('title', 'Crear usuario') @section('content')
<div class="row">
  <div class="card col-12">
    <div class="card-body">
      <h2>¿Eliminar Indicador?</h2>
      <form action="/indicadores/{{$id}}/delete" method="post" class="form">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="confirm">Seguro deseas eliminar esta indicador? De ser asi, da click en el boton de abajo.</label>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-danger" value="Eliminar">
          <a href="/indicadores" class="btn btn-primary">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection