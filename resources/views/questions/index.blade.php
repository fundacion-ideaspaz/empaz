@extends('layouts.master') @section('title', 'Panel de Preguntas') @section('content')
<div class="row">
  <div class="col-12 card">
    <div class="card-body">
      <h2>Lista de Preguntas</h2>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Texto</th>
            <th>Descripción</th>
            <th>Tipo de Respuesta</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($questions as $pregunta)
          <p></p>
          <tr>
            <td>{{$pregunta->nombre}}</td>
            <td>{{$pregunta->descripcion}}</td>
            <td>
              {{ ucfirst(str_replace('_', ' ', $pregunta->tipo_respuesta)) }}
            </td>
            <td>
              <a class="btn btn-sm btn-primary" href="/preguntas/{{$pregunta->id}}/edit">Edit</a>
              <a class="btn btn-sm btn-danger" href="/preguntas/{{$pregunta->id}}/delete">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      <div class="pull-righ">
        <a class="btn btn-primary" href="/preguntas/new/">Crear Pregunta</a>
      </div>
    </div>
  </div>
</div>
@endsection