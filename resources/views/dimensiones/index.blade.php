@extends('layouts.master') @section('title', 'Panel de Dimensiones') @section('content')
<div class="row">
  <div class="col-12 card">
    <div class="card-body">
      <h2>Panel de Dimensiones</h2>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th width="25%">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($dimensiones as $indexKey => $dimension)
          <p></p>
          <tr>
            <td>  {{$indexKey+1}}</td>
            <td>{{$dimension->nombre}}</td>
            <td>{{ucfirst($dimension->estado)}}</td>
            <td width="25%">
              <a class="btn btn-sm btn-primary" href="/dimensiones/{{$dimension->id}}/edit" data-toggle="tooltip" data-placement="bottom"
                title="Editar">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              </a>
              <a class="btn btn-sm btn-danger" href="/dimensiones/{{$dimension->id}}/delete" data-toggle="tooltip" data-placement="bottom"
                title="Eliminar">
                <i class="fa fa-trash" aria-hidden="true"></i>
              </a>
              <a class="btn btn-sm btn-primary descripcion tip" data-placement="bottom" href="#" data-toggle="tooltip"><i class="fa fa-info-circle" aria-hidden="true"></i> <span>{!!$dimension->descripcion!!}</span> </a>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
          {{ $dimensiones->render() }}
        </div>
      </div>
    </div>
    <div class="card-footer">
      <div class="pull-righ">
        <a class="btn btn-primary" href="/dimensiones/new/">Crear dimensión</a>
      </div>
    </div>
  </div>
</div>
@endsection
