@extends('layouts.master') @section('title', 'Cuestionarios Activos') @section('content')
<div class="row">
  <div class="col-12 card">
    <div class="card-body">
      <h2>Cuestionario EmPaz</h2>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Nombre</th>
            <th width="25%">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cuestionarios as $cuestionario)
          <p></p>
          <tr>
            <td>{{$cuestionario->nombre}}</td>
            <td width="25%">
              <a class="btn btn-sm btn-primary" href="/responder/{{$cuestionario->id}}">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Contestar
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
<!--     <div class="card-footer">
      <div class="pull-righ">
        <a class="btn btn-primary" href="/cuestionarios/new/">Crear Cuestionario</a>
      </div>
    </div> -->
  </div>
</div>
@endsection