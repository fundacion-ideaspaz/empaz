@extends('layouts.master') @section('title', 'Cuestionarios Activos') @section('content')
<div class="row">
  <div class="col-12 card">
    <div class="card-body">
      <h2>EmPaz – Herramienta de medición de aportes empresariales a la paz</h2>
      <table class="table table-striped table-hover">
        <tbody>
          <h5>Seleccione el cuestionario que desea diligenciar:</h5>
          <br>
          @foreach($cuestionarios as $cuestionario)
          <tr>
            <td>{{$cuestionario->nombre}}</td>
            <td width="25%">
              <a class="btn btn-sm btn-primary" href="/responder/{{$cuestionario->id}}">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ir a las preguntas
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
