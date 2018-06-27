@extends('layouts.masterTablero') @section('title', 'Informe de diagnóstico') @section('content')
<script type="text/javascript">

    FusionCharts.ready(function () {

    var ageGroupChart = new FusionCharts({
    type: 'pie2d',
            renderAt: 'chart-container',
            width: '100%',
            height: '300',
            dataFormat: 'json',
            dataSource: {
            "chart": {
            "paletteColors": "#0075c2,#1aaf5d,#f2c500,#f45b00,#8e0000",
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
                    "legendItemFontColor": '#666666'
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
            height: '300',
            dataFormat: 'json',
            dataSource: {
            "chart": {
            "captionFontSize": "14",
                    "legendPadding": "-60",
                    "chartTopMargin": "20",
                    "plotToolText": "$label: $value%",
                    "subcaptionFontSize": "14",
                    "numberPrefix":"%",
                    "baseFontColor" : "#333333",
                    "baseFont" : "Helvetica Neue,Arial",
                    "subcaptionFontBold": "0",
                    "paletteColors": "#008ee4,#6baa01",
                    "bgColor" : "#ffffff",
                    "radarfillcolor": "#ffffff",
                    "showBorder" : "0",
                    "showShadow" : "0",
                    "showCanvasBorder": "0",
                    "legendBorderAlpha": "0",
                    "legendShadow": "0",
                    "divLineAlpha": "10",
                    "usePlotGradientColor": "0",
                    "numberPreffix": "%",
                    "legendBorderAlpha": "0",
                    "legendShadow": "0",
                    "yAxisMaxValue" : "100",
                    "yAxisValuesStep": "5",
                    "legendAllowDrag": "1",
                    "legendPosition": "bottom"
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

  <!-- <div class="col-md-2"><i class="fa fa-address-card" aria-hidden="true"></i></div> -->
    <div class="col-sm-12 col-md-7">
      <h5>Información de la empresa</h5>
      <br>
        <table class="table report-text">
          <div class="col-sm-7 col-md-7">
            <tr>
              <td><strong>Empresa</strong></td>
              <td>{{$empresa->nombre}}</td>
            </tr>
              <tr>
              <td><strong>Representante</strong></td>
              <td>{{Auth::user()->nombre}}</td>
            </tr>
              <tr>
              <td><strong>Email</strong></td>
              <td>{{Auth::user()->email}}</td>
            </tr>
              <tr>
              <td><strong>Fecha del informe:</strong></td>
              <td>{{$cuestionario->created_at->toDateString()}}</td>
            </tr>
          </div>
        </table>
    </div>
    <div class="col-sm-12 col-md-5">
      <h5>Convenciones </h5>
      <br>
      <img src="/table_results.svg" width="80%">
    </div>
</div>
</div>
<div class="content-blanco no-margen">
<h5>Resultado general</h5>
<p class="report-text">El puntaje obtenido por su empresa es:</p>
<div class="row">
    <div class="col-md-2 resultado-g" data-sema="{{$rCuestionario}}">
        {{$rCuestionario}}%
    </div>
    <div class="col-md-10 report-text" id="resultados" data-texto="{{$rCuestionario}}">
    </div>
</div>
<div class="row">
    <div class="card col-sm-12 col-md-6">
      <div class="card-header align-items-center d-flex justify-content-center">
        <h5>Importancia de dimensiones</h5>
      </div>
        <div class="card-body">
            <div id="chart-container">FusionCharts will render here</div>
        </div>
    </div>
    <div class="card col-sm-12 col-md-6">
      <div class="card-header align-items-center d-flex justify-content-center">
        <h5>Resultado por dimensiones</h5>
      </div>
        <div class="card-body">
          <div id="chart-container2">FusionCharts will render here</div>
        </div>
    </div>
</div>
<div class="row">
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
<h5>Resultado por dimensiones</h5>
<p class="report-text">Haga click sobre alguna de las dimensiones para desplegar el resultado por indicadores.</p>
<div id="accordion" role="tablist">
    @foreach($puntajeDimensiones as $i=>$dimension)
    <div class="card">
        <div class="card-header" role="tab" id="headingOne">
            <span data-toggle="collapse" href="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{ $i }}">
                <div class="row">
                    <div class="col-md-2 resultado-d resultado-d-{{$dimension}}" data-dime="{{$dimension}}" onload="color_squares()">
                        {{ $dimension }}%
                    </div>
                    <div class="col-md-3 report-text" style=" display: flex; justify-content: center; flex-direction: column;">
                        <strong> {{ $dimensiones[$i]->nombre }}: {{$niveles[$i]}} </strong>
                    </div>
                    <div class="col-md-7 report-text" style="display: flex; justify-content: center; flex-direction: column; overflow-y: auto">
                      {!! $eDimensiones[$i]->descripcion !!}
                    </div>
                </div>
            </span>
        </div>
        <div id="collapse{{$i}}" class="collapse indicadores-dimension" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body card-indicadores">
                <h5>Indicadores de la dimensión</h5>
                            <div class="row">
                            <div class="col-md-12">
                              <p class="report-text">Este gráfico de barras representa los puntajes obtenidos para cada uno de los indicadores dentro de la dimensión {{$dimensiones[$i]->nombre}}. Si desea conocer más información acerca de cada indicador, deslice el cursor sobre la barra y tendrá una breve descripción de cada uno de ellos.</p>
                                        <script type="text/javascript">
                                        FusionCharts.ready(function () {
                                            var revenueChart = new FusionCharts({
                                                type: 'column2d',
                                                renderAt: 'chart-container-bar{{$i}}',
                                                width: '70%',
                                                height: '280',
                                                dataFormat: 'json',
                                                dataSource: {
                                                    "chart": {
                                                        "xAxisName": "Indicador",
                                                        "numberPrefix": "%",
                                                        "paletteColors": "#0075c2",
                                                        "bgColor": "#ffffff",
                                                        "borderAlpha": "20",
                                                        "canvasBorderAlpha": "0",
                                                        "usePlotGradientColor": "0",
                                                        "plotBorderAlpha": "10",
                                                        "placevaluesInside": "1",
                                                        "rotatevalues": "1",
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
                                                        "yAxisMinValue": "0"
                                                    },
                                                    "data": [

                                                              <?php
                                                              foreach ($puntajeIndicadores as $j => $rindicador) {
                                                                if ($indicadores[$j]->dimension_id == $dimensiones[$i]->id) {
                                                                  echo '{ label": "'. $indicadores[$j]->nombre.'", "value": "'.$rindicador.'", "tooltext": "'. $indicadores[$j]->descripcion.'"} \n';
                                                                }
                                                               }
                                                               ?>
                                                    ]
                                                }
                                            }).render();
                                        });


                                        </script>
                                <div id="chart-container-bar{{$i}}" style="  display: table; margin: 0 auto;">FusionCharts will render here</div>
                            </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
</div>
<div id="informeCPDF"></div>

<script type="text/javascript">

function color_squares() {

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


      var contentD = $('.resultado-d').attr("data-dime");
      var contentClassD = ".resultado-d" + "-" + contentD;
      // var contentDi = $('.resultado-d').attr("data-dime");
      if (contentD >= 86 && contentD <= 100){
        $(contentClassD).addClass('verde');
      }
      else if (contentD >= 61 && contentD <= 85){
        $(contentClassD).addClass('otro-verde');
      }
      else if (contentD >= 41 && contentD <= 60){
        $(contentClassD).addClass('amarillo');
      }
      else if (contentD >= 16 && contentD <= 40){
        $(contentClassD).addClass('naranja');
      }
      else if (contentD >= 0 && contentD <= 15){
        $(contentClassD).addClass('rojo');
      };
};

$(document).ready(function(){
  color_squares();
});


     // var contentI = $('.resultado-i').attr("data-indi");
     // if (contentI >= 86 && contentI <= 100){
     // $('.resultado-i').addClass('verde');
     // }
     // else if (contentI >= 57 && contentI <= 85){
     // $('.resultado-i').addClass('otro-verde');
     // }
     // else if (contentI >= 31 && contentI <= 60){
     // $('.resultado-i').addClass('amarillo');
     // }
     // else if (contentI >= 11 && contentI <= 30){
     // $('.resultado-i').addClass('naranja');
     // }
     // else{
     // $('.resultado-i').addClass('rojo');
     // };


    //
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
