@extends('layouts.master') @section('title', 'Eliminar Pregunta') @section('content')
<div class="row">
  <div class="card col-12">
    <div class="card-body">
      <h2>¿Eliminar Pregunta?</h2>
      <form action="/preguntas/{{$id}}/delete" method="post" class="form">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="confirm">¿Seguro deseas eliminar esta pregunta? De ser asi, da clic en el boton de abajo.</label>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-danger" value="Eliminar">
          <a href="/preguntas" class="btn btn-primary">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
