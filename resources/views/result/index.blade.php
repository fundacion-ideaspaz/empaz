@extends('layouts.master') @section('title', 'Panel de Cuestionarios') @section('content')
<div class="row">
  <div class="col-12 card">
    <div class="card-body">
      <h2>Lista de Cuestionarios</h2>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Versión</th>
            <th>Estado</th>
            <th width="25%">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cuestionarios as $cuestionario)
          @if($cuestionario->id === $cuestionario->cuest_id_parent)
          <tr>
            <td class="nombre-column">
              {{$cuestionario->nombre}}
            </td>
            <td class="version-column">
              {{ $cuestionario->version }}
            </td>
            <td class="estado-column">
              {{ $cuestionario->estado }}
            </td>
            <td width="25%">
              <a class="btn btn-sm btn-primary" href="/cuestionarios/{{$cuestionario->id}}/edit" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              <a class="btn btn-sm btn-primary" href="/cuestionarios/{{$cuestionario->id}}/copy" data-toggle="tooltip" data-placement="bottom" title="Copiar"><i class="fa fa-clone" aria-hidden="true"></i></a>
              <a class="btn btn-sm btn-danger" href="/cuestionarios/{{$cuestionario->id}}/delete" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></a>
              <a href="/dashboard/cuestionario/{{$cuestionario->id}}" class="btn btn-sm btn-primary descripcion" data-placement="bottom" href="#" data-toggle="tooltip" data-placement="bottom" title="{{$cuestionario->descripcion}}"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
            </td>
          </tr>
          
          <tr class="children">
              <!-- <td>- {{$cuestionario->nombre}}</td> -->
              <td colspan="4">
              <div class="row">
              @else
<div class="col-md-4">Versión {{ $cuestionario->version }}
<a class="btn btn-sm btn-primary" href="/cuestionarios/{{$cuestionario->id}}/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a class="btn btn-sm btn-primary" href="/cuestionarios/{{$cuestionario->id}}/copy"><i class="fa fa-clone" aria-hidden="true"></i></a>
                <a class="btn btn-sm btn-danger" href="/cuestionarios/{{$cuestionario->id}}/delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <a href="/dashboard/cuestionario/{{$cuestionario->id}}" class="btn btn-sm btn-primary descripcion" data-placement="bottom" href="#" data-toggle="tooltip" data-placement="bottom" title="{{$cuestionario->descripcion}}"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
</div>
                
                @endif
          @endforeach
          </div>
              </td>
            </tr>
          
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      <div class="pull-righ">
        <a class="btn btn-primary" href="/cuestionarios/new">Crear Cuestionario</a>
      </div>
    </div>
  </div>
</div>
@endsection
