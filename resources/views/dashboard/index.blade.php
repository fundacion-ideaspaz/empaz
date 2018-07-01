@extends('layouts.master') @section('title', 'Cuestionarios Resueltos') @section('content')
<div class="row">
  <div class="col-12 card">
    <div class="card-body">
      <h2>Panel de cuestionarios resueltos</h2>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Cuestionario</th>
            <th>Versión</th>
            <th>Empresa</th>
            <th>Usuario</th>
            <th width="25%">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cuestionarios_resueltos as $cuestRes)
          <tr>
            <td>{{$cuestRes->cuestionario->nombre}}</td>
            <td>{{$cuestRes->cuestionario->version}}</td>
            <td>{{$cuestRes->user->empresa->nombre}}</td>
            <td>{{$cuestRes->user->nombre}}</td>
            <td width="10%">
              <a class="btn btn-sm btn-primary" href="/dashboard/{{$cuestRes->id}}" title="Ver Respuestas">
                <span class="fa fa-search"></span>
              </a>
              <a class="btn btn-sm btn-primary" href="/reportes/{{$cuestRes->id}}" title="Ver Tablero">
                <span class="fa fa-tachometer"></span>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
