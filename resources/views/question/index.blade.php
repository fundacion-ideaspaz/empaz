@extends('layouts.master') @section('title', 'Panel de Preguntas') @section('content')
<div class="row">
  <div class="col-12 card">
    <div class="card-body">
      <h2>Lista de Preguntas</h2>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Texto Pregunta</th>
            <th>Descripción Pregunta</th>
            <th>Tipo de Respuesta</th>
            <th>Texto de Respuesta</th>
          </tr>
        </thead>
        <tbody>
          @foreach($questions as $question)
          <p></p>
          <tr>
            <td>{{$question->texto}}</td>
            <td>{{$question->descripcion}}</td>
            <td>{{$question->tiporespuesta}}</td>
            <td>{{$question->textorespuesta}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      <div class="pull-righ">
        <a href="/questions/new" class="btn btn-primary">Create a Question</a>
      </div>
    </div>
  </div>
</div>
@endsection
