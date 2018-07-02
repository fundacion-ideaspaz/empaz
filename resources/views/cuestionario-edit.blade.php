@extends('layouts.masterAnimationCues') @section('title', 'Responder Cuestionario') @section('content')

      <div class="fs-form-wrap r-cuestionario" id="fs-form-wrap">
      <form action="/responder/edit/{{$cuestionario_result_id}}" method="post" class="form fs-form fs-form-full" enctype="multipart/form-data" id="cuestForm" autocomplete="off">
      {{ csrf_field() }}
      <ol class="fs-fields">
        @foreach($cuestionario->allPreguntas() as $index => $pregunta)
        <?php
        $respuesta_register = $respuestas_cuest->where('pregunta_id', '=', $pregunta->id)->first();
        if ($respuesta_register) {
          $selected_opcion_id = $respuesta_register->opcion_respuesta_id;
        } else {
          $selected_opcion_id = NULL;
        }
         ?>
          @component('components/preguntafield-edit',['pregunta' => $pregunta,
                                                  'cuest_id' => $cuestionario->id,
                                                  'index' => $index+1,
                                                  'selected_opcion_id' => $selected_opcion_id])
          @endcomponent
        @endforeach
      </ol>
      <div class="fs-submit table-row">
        <div class="col-md-3" style="display: table-cell;">
          <a href="/responder/edit/{{$cuestionario_result_id}}" class="btn btn-danger">Limpiar</a>
        </div>
        @if(Auth::user()->role === 'superadmin' ||Auth::user()->role === 'experto')
        <div class="col-md-3" style="display: table-cell;">
          <a class="btn btn-warning" href="/responder">Volver</a>
        </div>
        @endif
        @if(Auth::user()->role === 'empresa')
        <div class="col-md-3" style="display: table-cell;">
          <input type="submit" class="btn btn-primary" value="guardar" id="save_button">
        </div>
        <div class="col-md-3" style="display: table-cell;">
          <input type="submit" class="btn btn-success btn-small" value="enviar" onclick="validate_fields();" title="Todas las preguntas deben tener una respuesta asginada para enviar.">
        </div>
        @endif
      </div>
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      </form>
  </div>

  <script type="text/javascript">
    function validate_fields(){
      $("select").attr('required',true);
    }

    $(document).on("click", function () {
      var flag = 1;
      $("select").each(function(){
        if (!$(this).val()) {
          flag = 0;
        }
      }
      )
      if (flag===1) {
        $('#save_button').hide()
      }
    });



  </script>

  @endsection
