@extends('layouts.master') @section('title', 'Crear usuario') @section('content')
<div class="row">
  <div class="card col-12">
    <div class="card-body">
      <h2>¿Eliminar Usuario?</h2>
      <form action="/users/{{$user->id}}/delete" method="post" class="form">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="confirm">Seguro deseas eliminar este usuario? De ser asi, da click en el boton de abajo.</label>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-danger" value="Eliminar">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection