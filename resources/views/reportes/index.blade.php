@extends('layouts.masterTablero') @section('title', 'Informe de diagnóstico') @section('content')

<!-- Caffeine -->
<meta name="caffeinated" content="false">

<script type="text/javascript">

    FusionCharts.ready(function () {

    var ageGroupChart = new FusionCharts({
    type: 'pie2d',
            renderAt: 'chart-container',
            width: '100%',
            height: '200',
            dataFormat: 'json',
            dataSource: {
            "chart": {
            "paletteColors": "#0075c2,#1aaf5d,#f2c500,#f45b00,#8e0000",
            "chartTopMargin": "0",
            "chartBottomMargin": "0",
                    "bgColor": "#ffffff",
                    "showBorder": "0",
                    "use3DLighting": "0",
                    "showShadow": "0",
                    "enableSmartLabels": "0",
                    "startingAngle": "0",
                    "showPercentValues": "1",
                    "showPercentInTooltip": "0",
                    "decimals": "1",
                    "captionFontSize": "14",
                    "subcaptionFontSize": "14",
                    "subcaptionFontBold": "0",
                    "toolTipColor": "#ffffff",
                    "toolTipBorderThickness": "0",
                    "toolTipBgColor": "#000000",
                    "toolTipBgAlpha": "80",
                    "toolTipBorderRadius": "2",
                    "toolTipPadding": "5",
                    "showHoverEffect":"1",
                    "showLegend": "0",
                    "legendBgColor": "#ffffff",
                    "legendBorderAlpha": '0',
                    "legendShadow": '0',
                    "legendItemFontSize": '10',
                    "legendItemFontColor": '#666666',
                    "enableSmartLabels": "1",
                    "manageLabelOverflow": "1",
                    "useEllipsesWhenOverflow": "1",
                    "labelFontSize":"10",
            },
                    "data": [
                            @foreach($rImportancia as $i=> $importancia)
                    {
                    "label": "{{ $dimensiones[$i]->nombre }}",
                            "value": "{{$importancia}}"
                    },
                            @endforeach
                    ]
            }
    }).render();
    });

    FusionCharts.ready(function () {
    var budgetChart2 = new FusionCharts({
    type: 'radar',
            renderAt: 'chart-container2',
            width: '100%',
            height: '380',
            dataFormat: 'json',
            dataSource: {
            "chart": {
            "captionFontSize": "14",
                    "legendPadding": "-20",
                    "chartTopMargin": "20",
                    "plotToolText": "$label",
                    "subcaptionFontSize": "14",
                    "numberSuffix":"%",
                    "baseFontColor" : "#333333",
                    "baseFont" : "Helvetica Neue,Arial",
                    "subcaptionFontBold": "0",
                    "paletteColors": "#008ee4,#6baa01",
                    "bgColor" : "#ffffff",
                    "radarfillcolor": "#ffffff",
                    "showBorder" : "0",
                    "showShadow" : "0",
                    "showValues": "1",
                    "showCanvasBorder": "0",
                    "legendBorderAlpha": "0",
                    "legendShadow": "0",
                    "divLineAlpha": "10",
                    "usePlotGradientColor": "0",
                    "numberPreffix": "%",
                    "legendBorderAlpha": "0",
                    "legendShadow": "0",
                    "showYAxisValues":"0",
                    "yAxisMaxValue" : "100",
                    "yAxisValuesStep": "1",
                    "legendAllowDrag": "1",
                    "legendPosition": "bottom",
                    "enableSmartLabels": "1",
                    "manageLabelOverflow": "1",
                    // "useEllipsesWhenOverflow": "1",
                    "labelFontSize":"1%",

            },
                    "categories": [
                    {
                    "category": [


                            @foreach($puntajeDimensiones as $i=> $dimension)
                    { "label": "{{ $dimensiones[$i]->nombre }}"},
                            @endforeach
                    ]
                    }
                    ],
                    "dataset": [
                    {
                    "seriesname": "Porcentaje de cumplimiento",
                            "data": [
                                    @foreach($puntajeDimensiones as $i=> $dimension)
                            { "value": "{{$dimension}}"},
                                    @endforeach
                            ]
                    }
                    ]
            }
    }).render();
    });



    </script>
<div id="informeC">
<div class="content-blanco" style="text-align:center; padding-bottom: 3px;">
  <h2>Informe de diagnóstico - EmPaz</h2>
  </div>
<div class="content-blanco">
<!-- <button id="informe">Descargar PDF</button> -->
<div class="row">

    <div class="col-sm-12 col-md-12">
      <h5>Información de la empresa</h5>
      <br>
        <table class="table report-text">
            <tr>
              <td><strong>Empresa</strong></td>
              <td>{{$empresa->nombre}}</td>
            </tr>
              <tr>
              <td><strong>Representante</strong></td>
              <td>{{$empresa->user->nombre}}</td>
            </tr>
              <tr>
              <td><strong>Email</strong></td>
              <td>{{$empresa->user->email}}</td>
            </tr>
              <tr>
              <td><strong>Fecha del informe:</strong></td>
              <td>{{$cuestionario->created_at->toDateString()}}</td>
            </tr>
        </table>
    </div>
</div>
</div>
<div class="content-blanco no-margen">
<h5>Resultado general</h5>
<p class="report-text">En este informe, usted encuentra los resultados obtenidos por su empresa en las seis dimensiones de intervención empresarial para la paz y los indicadores de medición en cada una de las dimensiones (para más información sobre dimensiones, indicadores y preguntas asociadas, ver la sección Manual).</p>
<div class="row">
  <div class="col-sm-12 col-md-6">
    <p class="report-text">El resultado general y el resultado en cada dimensión, se visualizan mediante el mapa de calor EmPaz:</p>
    <img src="/table_results.svg" width="70%">
  </div>
  <div class="col-sm-12 col-md-6">
    <p class="report-text">Esta es la importancia que tienen las dimensiones en la medición EmPaz:</p>
      <div id="chart-container">FusionCharts will render here</div>
  </div>
</div>

<p class="report-text">El puntaje obtenido por su empresa es:</p>
<div class="row">
    <div class="col-md-2 resultado-g" data-sema="{{$rCuestionario}}">
        {{$rCuestionario}}%
    </div>
    <div class="col-md-10 report-text" id="resultados" data-texto="{{$rCuestionario}}">
    </div>
</div>
<div class="row">
    <div class="card col-sm-12 col-md-12">
      <div class="card-header align-items-center d-flex justify-content-center">
        <h5>Resultado por dimensiones</h5>
      </div>
        <div class="card-body">
          <div id="chart-container2">FusionCharts will render here</div>
        </div>
    </div>
</div>
<div class="row">
  <p class="report-text">Para conocer su significado, por favor haga click en la dimensión: </p>
<ul class="nav nav-pills nav-justified w-100" id="pills-tab" role="tablist">
  @foreach($dimensiones as $idx => $dim)
  <li class="nav-item">
    <a class="dim_description nav-link {{$idx === 0 ? 'active' : ''}} report-text" id="pills-tab-{{$dim->id}}" data-toggle="pill" href="#pills-{{$dim->id}}" role="tab" aria-controls="pills-{{$dim->id}}" aria-selected="{{$idx === 0 ? 'true' : ''}}">{{$dim->nombre}}</a>
  </li>
  @endforeach
</ul>
</div>
<div class="row">
<div class="tab-content" id="pills-tabContent">
  @foreach($dimensiones as $idx => $dim)
  <div class="tab-pane fade {{$idx === 0 ? 'show active' : ''}} report-text" id="pills-{{$dim->id}}" role="tabpanel" aria-labelledby="pills-tab-{{$dim->id}}" >{!!$dim->descripcion!!}</p></div>
  @endforeach
</div>
</div>
</div>



<div class="content-blanco">
<h5>Resultado detallado por dimensiones</h5>
<!-- <p class="report-text">Haga click sobre alguna de las dimensiones para desplegar el resultado por indicadores.</p> -->
<div id="accordion" role="tablist">
    @foreach($puntajeDimensiones as $i=>$dimension)
    <div class="card">
        <div class="card-header" role="tab" id="headingOne">
            <span data-toggle="collapse" href="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{ $i }}">
                <div class="row">
                    <div class="col-md-2 resultado-d" data-dime="{{$dimension}}" onload="color_dimension_squares()">
                        {{ $dimension }}%
                    </div>
                    <div class="col-md-3 report-text" style=" display: flex; justify-content: center; flex-direction: column;">
                        <p>{{ $dimensiones[$i]->nombre }}: <strong>{{$niveles[$i]}} </strong></p>
                    </div>
                    <div class="col-md-7 report-text" style="display: flex; justify-content: center; flex-direction: column; overflow-y: auto">
                      <p>{!! $eDimensiones[$i]->descripcion !!} <strong>Haga click</strong> sobre esta dimensión para ver resultado por indicadores.</p>
                    </div>
                </div>
            </span>
        </div>
        <div id="collapse{{$i}}" class="collapse indicadores-dimension" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body card-indicadores">
                <h5>Indicadores de la dimensión</h5>
                            <div class="row">
                            <div class="col-md-12">
                              <p class="report-text">Este gráfico representa los puntajes obtenidos por su empresa para cada uno de los indicadores dentro de la dimensión {{$dimensiones[$i]->nombre}}. Si desea conocer más información acerca de cada indicador, seleccione la opción en la lista desplegable y obtendrá una breve descripción de cada uno de ellos. Si el indicador aparece en cero en la gráfica, no aplica para su empresa.</p>
                                        <script type="text/javascript">
                                        FusionCharts.ready(function () {
                                            var revenueChart = new FusionCharts({
                                                type: 'column2d',
                                                renderAt: 'chart-container-bar{{$i}}',
                                                width: '99%',
                                                height: '280',
                                                dataFormat: 'json',
                                                dataSource: {
                                                    "chart": {
                                                        "xAxisName": "Indicador",
                                                        "numberSuffix": "%",
                                                        "paletteColors": "#0075c2",
                                                        "bgColor": "#ffffff",
                                                        "borderAlpha": "20",
                                                        "canvasBorderAlpha": "0",
                                                        "usePlotGradientColor": "0",
                                                        "plotBorderAlpha": "10",
                                                        "placevaluesInside": "1",
                                                        "showBorder": "0",
                                                        "rotatevalues": "0",
                                                        "valueFontColor": "#ffffff",
                                                        "showXAxisLine": "1",
                                                        "xAxisLineColor": "#999999",
                                                        "divlineColor": "#999999",
                                                        "divLineIsDashed": "1",
                                                        "showLegend": "1",
                                                        "showAlternateHGridColor": "0",
                                                        "subcaptionFontBold": "0",
                                                        "subcaptionFontSize": "14",
                                                        "yAxisMaxValue": "100",
                                                        "yAxisMinValue": "0",
                                                        "manageLabelOverflow": "1",
                                                        "useEllipsesWhenOverflow": "0",
                                                        "labelFontSize":"9",
                                                    },
                                                    "data": [

                                                              <?php
                                                               foreach ($puntajeIndicadores as $j => $rindicador) {
                                                                if ($indicadores[$j]->dimension_id == $dimensiones[$i]->id) {
                                                                  echo '{ "label": "'. $indicadores[$j]->nombre.'", "value": "'.$rindicador.'",}, ';
                                                                }
                                                               }
                                                               ?>
                                                    ]
                                                }
                                            }).render();
                                        });


                                        </script>
                                        <div class="row">
                                          <div class="col-sm-12 col-md-8" id="chart-container-bar{{$i}}" >FusionCharts will render here</div>
                                          <div class="col-sm-12 col-md-4">
                                            <select class="form-control" id="selected_i_{{$dimensiones[$i]->id}}" onclick="show_indicator({{$dimensiones[$i]->id}})">
                                              <option value="" selected="true">Seleccione un indicador de la lista</option>
                                              @foreach($puntajeIndicadores as $j => $rindicador)
                                              @if($indicadores[$j]->dimension_id == $dimensiones[$i]->id)
                                              <option value="{{$indicadores[$j]->descripcion}}">{{$indicadores[$j]->nombre}}</option>
                                              @endif
                                              @endforeach
                                            </select>
                                            <div class="indicador-box" contenteditable="true" id="selected_i_d_{{$dimensiones[$i]->id}}"></div>
                                          </div>
                                        </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<br>
<p class="report-text">Si desea recibir más información sobre EmPaz y los resultados de su empresa, o si está interesado en conseguir asesoría personalizada que permita conocer más a profundidad el estado de su empresa, por favor contáctenos en el correo: info@empazweb.org, o teléfono: +57 1 218 3449. </p>
<p class="report-text">Le invitamos a comunicarse con nosotros para aplicar la herramienta EmPaz dentro de seis meses o un año con el fin permitir la comparación de sus resultados e identificar las mejoras en los aportes a la prevención de conflictos y construcción de paz de su empresa, con base en la aplicación de las lecciones aprendidas. </p>
</div>
</div>
<!-- <div id="informeCPDF"></div> -->

<script type="text/javascript">

function color_result_square() {

    var content = $('.resultado-g').attr("data-sema");
    if (content >= 86 && content <= 100){
      $('.resultado-g').addClass('verde');
    }
    else if (content >= 61 && content <= 85){
      $('.resultado-g').addClass('otro-verde');
    }
    else if (content >= 41 && content <= 60){
      $('.resultado-g').addClass('amarillo');
    }
    else if (content >= 16 && content <= 40){
      $('.resultado-g').addClass('naranja');
    }
    else{
      $('.resultado-g').addClass('rojo');
    };

    var contentR = $('#resultados').attr("data-texto");
    var ventana = document.getElementById("resultados");
    if (contentR >= 86 && contentR <= 100){
      $(ventana).append("Los aportes a la construcción de paz de su empresa se ubican en el nivel de <strong>Líder</strong> (puntaje obtenido: 86-100%) Le felicitamos por haber utilizado la herramienta EmPaz. Su empresa cuenta con políticas, planes y procedimientos en construcción de paz, que son implementados en diferentes niveles y áreas de operación. Con esto, la organización muestra que su compromiso con la construcción de paz se traduce de manera concreta en acciones, que pueden servir de buenas prácticas replicables por otras compañías y en otros sectores. Se recomienda que la empresa busque espacios para compartir sus experiencias en construcción de paz con sus pares, y que forje alianzas con otros actores –privados, públicos, sociales–, ampliando, así, el alcance de sus impactos en prevención de conflictos y promoción de la paz y la reconciliación. Para seguir mejorando su gestión en construcción de paz, recomendamos que su empresa, en intervalos definidos, evalúe la pertinencia y efectividad de sus acciones, actualizando sus análisis de riesgos e impactos y ajustando los indicadores de resultado, de ser necesario. Asimismo, es importante que de manera continua, se revisen los sistemas de monitoreo y evaluación existentes y que se sigan incluyendo lecciones aprendidas en el ciclo de mejora continua de la gestión y la toma de decisiones.");
    }
    else if (contentR >= 61 && contentR <= 85){
      $(ventana).append("Los aportes a la construcción de paz de su empresa se ubican en el nivel <strong>Avanzado</strong> (puntaje obtenido: 61-85%) Le felicitamos por haber utilizado la herramienta EmPaz. Su empresa ha incluido el tema de la construcción de paz en políticas, planes o procedimientos, y logra aportes significativos a la prevención de conflictos y promoción de la paz y reconciliación en su área de influencia. Sin embargo, el compromiso empresarial con la construcción de paz todavía no es de conocimiento generalizado o implementado en todos los niveles de su organización, por todos los trabajadores y transversal a la operación y la inversión social de la misma. Por esto, además de realizar campañas de sensibilización de empleados y contratistas sobre cómo incorporar el enfoque de construcción de paz en el día a día de la operación, se recomienda evaluar en qué aspectos y en qué niveles de la organización se pueden fortalecer los aportes a la construcción de paz, asegurar que las acciones todas las áreas –comerciales y de responsabilidad social- estén alineadas para este propósito, y formular metas, indicadores y mecanismos de control para medir y dar seguimiento a los resultados logrados.");
    }
    else if (contentR >= 41 && contentR <= 60){
      $(ventana).append("Los aportes a la construcción de paz de su empresa se ubican en el nivel <strong>Intermedio</strong> (puntaje obtenido: 41-50%) Le felicitamos por haber utilizado la herramienta EmPaz. Su empresa cuenta con políticas o planes en materia de construcción de paz en fase de desarrollo, en proceso de implementación inicial, o a nivel puntual, con acciones incidentales o proyectos piloto. Cualquiera de estas acciones representa un buen inicio hacia la integración de la construcción de paz de manera más integral en las actividades de la organización. En esta línea, recomendamos revisar en qué medida el compromiso con la construcción de paz es formulado a manera explícita desde los altos niveles directivos y de gobierno, e incorporado en estrategias y políticas, planes y procesos. Para lograr la alineación y coherencia en los esfuerzos para construir paz en todos los niveles de la empresa y en todas sus áreas geográficas de operación, es importante que todos los trabajadores y contratistas que actúen en nombre de su organización estén familiarizados con este compromiso y lo integren en el día a día de su trabajo. Asimismo, para ampliar y profundizar los aportes de su empresa a la prevención de conflictos y la promoción de la paz y la reconciliación, recomendamos incluir objetivos, metas e indicadores concretos e instalar mecanismos de control, que permitan planear y medir los resultados alcanzados y tomar decisiones para la mejora continua.");
    }
    else if (contentR >= 16 && contentR <= 40){
      $(ventana).append("Los aportes a la construcción de paz de su empresa se ubican en el nivel <strong>Básico</strong> (puntaje obtenido: 16-30%) Le felicitamos por haber aplicado la herramienta EmPaz Su empresa tiene algún conocimiento de las acciones que puede realizar el sector privado para aportar a la prevención de conflictos, la construcción de paz y la promoción de la reconciliación. En este sentido, al haber diligenciado la medición EmPaz, su organización ha mostrado su compromiso con la mejora de su gestión en esta materia. Si bien el tema de prevención de conflictos y promoción de la paz aún no se ve reflejado de manera sistemática en sus políticas y prácticas en este momento, se evidencia que su empresa realiza acciones al respecto de manera incidental, y que estas acciones logran cierto impacto positivo. Si quiere fortalecer sus aportes a la construcción de paz, recomendamos integrar el enfoque de prevención de conflictos y construcción de paz de manera más sistemática e intencional, en políticas y prácticas. Asimismo, es importante que desde los altos niveles directivos se difunda el compromiso explícito de la empresa con la paz, y que este compromiso sea reflejado en procesos y sistemas, con indicadores de resultado y mecanismos de control para medir resultados. Acciones como capacitaciones y campañas de sensibilización pueden ayudar a que gerentes, trabajadores y contratistas integren un enfoque de prevención de conflictos y promoción de la paz en las acciones que realizan en el día a día de la operación y las intervenciones sociales, en todos niveles y áreas geográficas donde su empresa hace presencia.");
    }
    else{
      $(ventana).append("Los aportes a la construcción de paz de su empresa se ubican en el nivel de <strong>Principiante</strong> (puntaje obtenido: 0-15%) Le felicitamos por haber aplicado la herramienta EmPaz. Con esto, su empresa demuestra un interés en promover la paz y la reconciliación. Se evidencia que sus aportes a este propósito todavía no son muy marcados en este momento. La organización todavía no cuenta con políticas y prácticas para la prevención de conflictos y construcción de paz que son implementadas de manera sistemática en todos los niveles de la organización, o cuenta tan solo con algunas de este tipo de políticas y prácticas, a manera muy puntual o aspiracional. Para empezar a generar aportes significativos, recomendamos abordar brechas en conocimientos, sensibilización y formación sobre el tema de la paz que puedan existir entre directivas, trabajadores, contratistas y proveedores. Asimismo, es importante tomar acciones para la promoción de una cultura de paz organizacional, que se manifieste en actitudes y acciones en el día a día de la operación. Asimismo, se recomienda incluir el enfoque de prevención de conflictividades y promoción de la paz y la reconciliación en políticas y estrategias, y alinear procesos, mecanismos y sistemas de su empresa con objetivos, indicadores e incentivos en construcción de paz. Esto, le permitirá planear, medir y controlar sus aportes a este importante propósito. .");
    };


};

$('.resultado-d').each(function() {
  var contentD = $(this).attr("data-dime");
  if (contentD >= 86 && contentD <= 100){
    var color_class = 'verde';
  }
  else if (contentD >= 61 && contentD <= 85){
    var color_class = 'otro-verde';
  }
  else if (contentD >= 41 && contentD <= 60){
    var color_class = 'amarillo';
  }
  else if (contentD >= 16 && contentD <= 40){
    var color_class = 'naranja';
  }
  else if (contentD >= 0 && contentD <= 15){
    var color_class = 'rojo';
  };
  $(this).addClass(color_class);
});

$(document).ready(function(){
  color_result_square();
});

function show_indicator(dim_id){

  $("#selected_i_"+dim_id).change(function() {
    var descrip = $(this).val();
    $("#selected_i_d_"+dim_id).html( descrip );
  });
};


    // var doc = new jsPDF();
    // var informeDescarga = {
    //     '#informeCPDF': function (element, renderer) {
    //         return true;
    //     }
    // };
    //
    // $('#informe').click( function() {
    //     doc.fromHTML($('#informeC').html(), 15, 15, {
    //         'width': 170,
    //         'elementHandlers': informeDescarga
    //     });
    //     doc.save('informe.pdf');
    // });

</script>


@endsection
