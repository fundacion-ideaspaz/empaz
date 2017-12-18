@extends('layouts.master') @section('title', 'Panel de Indicadores') @section('content')
<div class="row">
  <div class="col-12 card">
    <div class="card-body">
      <h2>Lista de Cuestionarios Resueltos</h2>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Cuestionario</th>
            <th>Empresa</th>
            <th>Usuario</th>
            <th width="25%">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cuestionarios_resueltos as $cuestRes)
          <tr>
            <td>
              {{$cuestRes->cuestionario->nombre}}
              Version {{$cuestRes->cuestionario->version}}
            </td>
            <td>{{$cuestRes->user->empresa->nombre}}</td>
            <td>{{$cuestRes->user->nombre}}</td>
            <td width="25%">
              <a class="btn btn-success" href="/dashboard/{{$cuestRes->id}}">
                Ver Cuestionario
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      <div class="pull-righ">
          {{ $cuestionarios_resueltos->links() }}
      </div>
    </div>
  </div>
</div>
@endsection