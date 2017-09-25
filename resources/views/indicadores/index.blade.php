@extends('layouts.master') @section('title', 'Panel de Indicadores') @section('content')
<div class="row">
  <div class="col-12 card">
    <div class="card-body">
      <h2>Lista de Indicadores</h2>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Nivel de Importancia</th>
            <th>Dimensiones</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($indicadores as $indicador)
          <p></p>
          <tr>
            <td>{{$indicador->nombre}}</td>
            <td>{{$indicador->descripcion}}</td>
            <td>{{ucfirst($indicador->nivel_importancia)}}</td>
            <td>
              <ul>
                @foreach($indicador->dimensiones as $dimension)
                <li>{{\App\Dimension::find($dimension)->nombre}}</li>
                @endforeach
              </ul>
            </td>
            <td>
              <a class="btn btn-sm btn-primary" href="/indicadores/{{$indicador->id}}/edit">Edit</a>
              <a class="btn btn-sm btn-danger" href="/indicadores/{{$indicador->id}}/delete">Delete</a>
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