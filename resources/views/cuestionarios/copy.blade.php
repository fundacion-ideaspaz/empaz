@extends('layouts.master') @section('title', 'Eliminar Pregunta') @section('content')
<div class="row">
  <div class="card col-12">
    <div class="card-body">
      <h2>Copiar Cuestionario?</h2>
      <form action="/cuestionarios/{{$cuestionario->id}}/copy" method="post" class="form">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="type">¿Que tipo de versionamiento quiere realizar?</label>
          <select name="type" value="{{ old('type') }}" id="type" class="form-control">
            <option value="true">Empezar desde versión anterior</option>
            <option value="false">Empezar desde 0</option>
          </select>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Crear copia">
          <a href="/cuestionarios" class="btn btn-warning">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
