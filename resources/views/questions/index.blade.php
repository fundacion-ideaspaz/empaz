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
            <th>Indicadores</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($questions as $question)
          <p></p>
          <tr>
            <td>{{$question->texto}}</td>
            <td>{{$question->descripcion}}</td>
            <td>{{ucfirst($question->tipo_respuesta)}}</td>
            <td>
              <ul>
                @foreach($question->indicadores as $indicador)
                <li>{{\App\Indicador::find($indicador)->nombre}}</li>
                @endforeach
              </ul>
            </td>
            <td>
              <a class="btn btn-sm btn-primary" href="/questions/{{$question->id}}/edit">Edit</a>
              <a class="btn btn-sm btn-danger" href="/questions/{{$question->id}}/delete">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      <div class="pull-righ">
        <a class="btn btn-primary" href="/questions/new/">Crear Pregunta</a>
      </div>
    </div>
  </div>
</div>
@endsection
