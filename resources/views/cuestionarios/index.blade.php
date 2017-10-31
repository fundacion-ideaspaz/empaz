@extends('layouts.master') @section('title', 'Panel de Preguntas') @section('content')
<div class="row">
  <div class="col-12 card">
    <div class="card-body">
      <h2>Lista de Cuestionarios</h2>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Versión</th>
            <th>Estado</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cuestionarios as $cuestionario)
          <p></p>
          <tr>
            <td>{{$cuestionario->nombre}}</td>
            <td>{{$cuestionario->descripcion}}</td>
            <td>
              {{ $cuestionario->version }}
            </td>
            <td>
              {{ $cuestionario->estado }}
            </td>
            <td>
              <a class="btn btn-sm btn-primary" href="/cuestionarios/{{$cuestionario->id}}/edit">Edit</a>
              <a class="btn btn-sm btn-danger" href="/cuestionarios/{{$cuestionario->id}}/delete">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      <div class="pull-righ">
        <a class="btn btn-primary" href="/cuestionarios/new/">Crear Cuestionario</a>
      </div>
    </div>
  </div>
</div>
@endsection