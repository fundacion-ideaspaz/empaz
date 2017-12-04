@extends('layouts.master') @section('title', 'Eliminar Pregunta') @section('content')
<div class="row">
  <div class="card col-12">
    <div class="card-body">
      <h1>Diagnostico: {{$rCuestionario}}%</h1>
    </div>
  </div>
</div>
<div class="row">
  <div class="card col-12">
    <div class="card-body">
      <h1>Importancia de Dimensiones</h1>
      <table class="table">
        @foreach($rImportancia as $i=>$importancia)
        <tr>
          <td>{{ $dimensiones[$i]->nombre }}</td>
            <td>{{ $dimensiones[$i]->descripcion}}</td>
          <td>{{$importancia}}%</td>
          @endforeach
        </tr>
      </table>
    </div>
  </div>
</div>
<div class="row">
  <div class="card col-12">
    <div class="card-body">
      <h1>Reporte de Indicadores</h1>
      <table class="table">
        @foreach($rIndicadores as $i=>$indicador)
        <tr>
          <td>{{ $indicadores[$i]->nombre }}</td>
            <td>{{ $indicadores[$i]->descripcion}}</td>
          <td>{{$indicador}}%</td>
          @endforeach
        </tr>
      </table>
    </div>
  </div>
</div>
<div class="row">
  <div class="card col-12">
    <div class="card-body">
      <h1>Reporte de Dimensiones</h1>
      <table class="table">
        @foreach($rDimensiones as $i=>$dimension)
        <tr>
          <td>{{ $dimensiones[$i]->nombre }}</td>
            <td>{{ $dimensiones[$i]->descripcion}}</td>
          <td>{{$dimension}}%</td>
          @endforeach
        </tr>
      </table>
    </div>
  </div>
</div>
@endsection
