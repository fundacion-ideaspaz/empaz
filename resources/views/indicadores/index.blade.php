@extends('layouts.master') @section('title', 'Panel de Indicadores') @section('content')
<div class="row">
  <div class="col-12 card">
    <div class="card-body">
      <h2>Lista de Indicadores</h2>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Estado</th>
            <th width="25%">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($indicadores as $indicador)
          <p></p>
          <tr>
            <td>{{$indicador->nombre}}</td>
            <td>{{ucfirst($indicador->estado)}}</td>
            <td width="25%">
              <a class="btn btn-sm btn-primary" href="/indicadores/{{$indicador->id}}/edit" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              <a class="btn btn-sm btn-danger" href="/indicadores/{{$indicador->id}}/delete" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></a>
              <a class="btn btn-sm btn-primary descripcion" data-placement="bottom" href="#" data-toggle="tooltip" title="{{$indicador->descripcion}}"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      <div class="pull-righ">
        <a class="btn btn-primary" href="/indicadores/new/">Crear indicador</a>
      </div>
    </div>
  </div>
</div>
@endsection