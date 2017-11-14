@extends('layouts.master') @section('title', 'Eliminar Pregunta') @section('content')
<div class="row">
  <div class="card col-12">
    <div class="card-body">
      <h1>Reporte de Indicadores</h1>
      <table class="table">
        @foreach($rIndicadores as $i=>$indicador)
        <tr>
          <td>{{ $indicadores[$i]->nombre }}</td>
          @foreach($indicador as $j=>$pregunta)
          <td>{{$pregunta}}</td>
          @endforeach @endforeach
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
          <td>{{$dimension}}</td>
          @endforeach
        </tr>
      </table>
    </div>
  </div>
</div>
@endsection