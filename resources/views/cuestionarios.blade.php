@extends('layouts.master') @section('title', 'Cuestionario') @section('content')
<div class="row">
  <div class="col-12 card">
    <div class="card-body">
      <h2>EmPaz – Herramienta de medición de aportes empresariales a la paz</h2>
      <table class="table table-striped table-hover">
        <tbody>
          <h5>Seleccione el cuestionario que desea diligenciar:</h5>
          <br>
          @foreach($cuestionarios as $cuestionario)
          @if($cuestionario->validateCuestionario()[0]==="valid")
          <tr>
            <td>{{$cuestionario->nombre}} @if($cuestionario->started()) (Guardado) @endif </td>
            <td width="25%">
              @if($cuestionario->cuestionario_done())
                <a class="btn btn-sm btn-primary" href="/reportes/{{$cuestionario->cuestionario_result->id}}">
                  <i class="fa fa-tachometer" aria-hidden="true"></i> Ver resultados
                </a>
              @else
                <a class="btn btn-sm btn-primary" href="/responder/{{$cuestionario->id}}">
                  <i class="fa fa-list-ol" aria-hidden="true"></i> Ir a las preguntas
                </a>
              @endif
            </td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
