@extends('layouts.masterTablero') @section('title', 'Eliminar Pregunta') @section('content')
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
                    "showLegend": "1",
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
            height: '450',
            dataFormat: 'json',
            dataSource: {
            "chart": {
            "captionFontSize": "14",
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
                    "legendShadow": "0"
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
                    "seriesname": "Porcentaje de afectacción",
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
<div class="content-blanco">
<h1>Información Basica</h1><button id="informe">Descargar PDF</button>
<div class="row">

    <div class="col-md-2"><i class="fa fa-address-card" aria-hidden="true"></i></div>
    <div class="col-md-5">
        <table class="table">
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
        </table>
    </div>
    <div class="col-md-5">
        <h3>Importancia de Dimensiones</h3>
        <div id="chart-container">FusionCharts will render here</div>
    </div>
</div>
</div>
<div class="content-blanco no-margen">
<h1>Resultados generales</h1>
<div class="row">
    <div class="col-md-2 resultado-g" data-sema="{{$rCuestionario}}">
        {{$rCuestionario}}%
    </div>
    <div class="col-md-10" id="resultados" data-texto="{{$rCuestionario}}">
    </div>
</div>
<div class="row">
    <div class="card col-12">
        <div class="card-body">
            <div id="chart-container2">FusionCharts will render here</div>
        </div>
    </div>
</div>
</div>

<div class="content-blanco">
<h1>Reporte de Dimensiones</h1>
<div id="accordion" role="tablist">
    @foreach($puntajeDimensiones as $i=>$dimension)
    <div class="card">
        <div class="card-header" role="tab" id="headingOne">
            <span data-toggle="collapse" href="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{ $i }}">
                <div class="row">
                    <div class="col-md-2 resultado-d resultado-d-{{$dimension}}" data-dime="{{$dimension}}">
                        {{ $dimension }}%
                    </div>
                    <div class="col-md-4">
                        {{ $dimensiones[$i]->nombre }}
                    </div>
                    <div class="col-md-6">
                      {{ html_entity_decode($dimensiones[$i]->descripcion) }}
                    </div>
                </div>
            </span>
        </div>
        @foreach($puntajeIndicadores as $j=>$rindicador)
        @if($indicadores[$j]->dimension_id == $dimensiones[$i]->id)
        <div id="collapse{{$i}}" class="collapse indicadores-dimension" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body card-indicadores">
                <h4>Indicadores de la dimension</h4>
                            <div class="row">
                            <div class="col-md-6">
                                <script type="text/javascript">
                                        FusionCharts.ready(function () {
    var revenueChart = new FusionCharts({
        type: 'column2d',
        renderAt: 'chart-container-bar{{$i}}',
        width: '100%',
        height: '350',
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
                "showAlternateHGridColor": "0",
                "subcaptionFontBold": "0",
                "subcaptionFontSize": "14"
            },            
            "data": [
                 
                    {
                    "label": "{{ $indicadores[$j]->nombre }}",
                    "value": "{{$rindicador}}"
                    },
                
            ]
        }
    }).render();
});
                                </script>
                                <div id="chart-container-bar{{$i}}">FusionCharts will render here</div>
                            </div>
                            <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-2 resultado-i" data-indi="{{$rindicador}}">
                                    {{$rindicador}}%
                                </div>
                                <div class="col-md-10">
                                    {{ $indicadores[$j]->nombre }}
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    @endforeach
</div>
</div>
</div> 
<div id="informeCPDF"></div>

<script type="text/javascript">

    var content = $('.resultado-g').attr("data-sema");
    if (content >= 86 && content <= 100){
    $('.resultado-g').addClass('verde');
    }
    else if (content >= 51 && content <= 85){
    $('.resultado-g').addClass('otro-verde');
    }
    else if (content >= 31 && content <= 50){
    $('.resultado-g').addClass('amarillo');
    }
    else if (content >= 11 && content <= 30){
    $('.resultado-g').addClass('naranja');
    }
    else{
    $('.resultado-g').addClass('rojo');
    };

    var contentR = $('#resultados').attr("data-texto");
    var ventana = document.getElementById("resultados");
    if (contentR >= 86 && contentR <= 100){
    $(ventana).append("Los aportes a la construcción de paz de su empresa se ubican en el nivel de <strong>Líder</strong> (puntaje obtenido: 86-100%) Su empresa cuenta con políticas, planes y procedimientos en materia de construcción de paz, que son implementados a diferentes niveles y áreas de operación. Con esto, la empresa muestra que su compromiso con la construcción de paz se traduce de manera concreta en acciones, que pueden servir de buenas prácticas replicables por otras empresas y en otros sectores. Se recomienda que la empresa busque espacios para compartir sus experiencias en construcción de paz con sus pares, y que forje alianzas con otros actores – privados, públicos, sociales – para ampliar el alcance de sus impactos en prevención de conflictos y promoción de paz y reconciliación. Para seguir mejorando la gestión en esta materia, recomendamos que su empresa, en intervalos definidos, evalúa la pertinencia y efectividad de sus acciones, actualizando sus análisis de riesgos e impactos y ajustando los indicadores de resultado, de ser necesario. Asimismo, es importante a manera continua, revisar los sistemas de monitoreo y evaluación existentes y seguir incluyendo lecciones aprendidas en el ciclo de mejora continua de la gestión y la toma de decisiones.");
    }
    else if (contentR >= 51 && contentR <= 85){
    $(ventana).append("Los aportes a la construcción de paz de su empresa se ubican en el nivel <strong>Avanzado</strong> (puntaje obtenido: 51-85%) Su empresa ha incluido el tema de la construcción de paz en políticas, planes o procedimientos, y logra aportes significativos a la prevención de conflictos y promoción de la paz y reconciliación en su área de influencia. Sin embargo, el compromiso empresarial con la construcción de paz todavía no es de conocimiento generalizado o implementado en todos los niveles de la empresa, por todos los trabajadores y transversal a la operación y la inversión social de la misma. Por esto, además de realizar campañas de sensibilización de empleados y contratistas sobre cómo incorporar el enfoque de construcción de paz en el día a día de la operación, se recomienda evaluar en qué aspectos y en qué niveles de la organización se pueden fortalecer los aportes a la construcción de paz, asegurar que las acciones todas las áreas –comerciales y de responsabilidad social- estén alineadas para este propósito, y formular metas, indicadores y mecanismos de control para medir y dar seguimiento a los resultados logrados.");
    }
    else if (contentR >= 31 && contentR <= 50){
    $(ventana).append("Los aportes a la construcción de paz de su empresa se ubican en el nivel <strong>Intermedio</strong> (puntaje obtenido: 31-50%) La empresa cuenta con políticas o planes en materia de construcción de paz en fase de desarrollo, en proceso de implementación inicial, o a nivel puntual, con acciones incidentales o proyectos piloto. Cualquiera de estas acciones representa un buen inicio hacia la integración de la construcción de paz de manera más integral en las actividades de la empresa. En esta línea, se recomienda revisar en qué medida el compromiso de la empresa con la construcción de paz es formulado a manera explícita desde los altos niveles directivos y de gobierno, y divulgado en todos los áreas de la empresa, para que los trabajadores y contratistas que actúen en nombre de la empresa, estén familiarizados con este compromiso y lo integren en el día a día de su trabajo. Para ampliar y profundizar los aportes de su empresa a la prevención de conflictos y la promoción de la paz y la reconciliación, es importante incluir objetivos y metas, indicadores y mecanismos de control para planear y medir resultados concretos en esta materia, en estrategias y políticas, planes y procesos");
    }
    else if (contentR >= 11 && contentR <= 30){
    $(ventana).append("Los aportes a la construcción de paz de su empresa se ubican en el nivel <strong>Básico</strong> (puntaje obtenido: 16-30%) La empresa tiene algún conocimiento de las acciones que puede realizar el sector privado para aportar a la prevención de conflictos, la construcción de paz y la promoción de la reconciliación. En este sentido, al haber diligenciado la medición EmPaz, su empresa ha mostrado su compromiso con la mejora de su gestión en esta materia. Si bien el tema de prevención de conflictos y promoción de la paz aún no se ve reflejado de manera sistemática en sus políticas y prácticas en el momento, se evidencia que su empresa realiza acciones al respecto de manera incidental y esporádica. Si la empresa quiere fortalecer sus aportes a la construcción de paz, debe integrar el enfoque de prevención de conflictos y construcción de paz de manera más sistemática e intencional, en sus políticas y prácticas. Asimismo, es importante que desde los altos niveles directivos se difunda el compromiso explícito de la empresa con la paz y que este compromiso sea incluido en políticas y estrategias, procesos y prácticas, con indicadores de resultado y mecanismos de control para medir resultados. Acciones como la formación y sensibilización pueden ayudar a que gerentes, trabajadores y contratistas integren el enfoque en prevención de conflictos y promoción de la paz en la operación y las intervenciones sociales, en todos niveles y áreas geográficas donde la empresa hace presencia.");
    }
    else{
    $(ventana).append("Los aportes a la construcción de paz de su empresa se ubican en el nivel de <strong>Principiante</strong> (puntaje obtenido: 0-10%) Le felicitamos por haber diligenciado la medición EmPaz. Con esto, su empresa demuestra un interés en promover la paz y la reconciliación. Se evidencia que los aportes a este propósito todavía no son muy marcados en este momento. La empresa no cuenta con políticas y prácticas para la prevención de conflictos y construcción de paz, que son implementadas de manera sistemática en todos los niveles de la organización. Para empezar a generar aportes significativos, recomendamos suplir brechas en conocimientos, sensibilización y formación sobre el tema de la paz entre directivas, trabajadores, contratistas y proveedores y promover una cultura de paz organizacional, que se manifieste en actitudes y acciones en el día a día de la operación. Asimismo, se recomienda incluir el enfoque de prevención de conflictividades y promoción de la paz y la reconciliación en políticas y estrategias, y alinear procesos y mecanismos existentes de la empresa con objetivos, indicadores e incentivos que permiten planear, medir y controlar los aportes de su empresa a este importante propósito.");
    };

    // var contentD = $('.resultado-d').attr("data-dime");
    // var contentClassD = ".resultado-d" + "-" + contentD;
    // // var contentDi = $('.resultado-d').attr("data-dime");
    // if (contentD >= 86 && contentD <= 100){
    // $('.resultado-d').addClass('verde');
    // }
    // else if (contentD >= 57 && contentD <= 85){
    // $('.resultado-d').addClass('otro-verde');
    // }
    // else if (contentD >= 31 && contentD <= 60){
    // $('.resultado-d').addClass('amarillo');
    // }
    // else if (contentD >= 11 && contentD <= 30){
    // $('.resultado-d').addClass('naranja');
    // }
    // else{
    // $('.resultado-d').addClass('rojo');
    // };

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


    var doc = new jsPDF();
    var informeDescarga = {
        '#informeCPDF': function (element, renderer) {
            return true;
        }
    };

    $('#informe').click( function() {
        doc.fromHTML($('#informeC').html(), 15, 15, {
            'width': 170,
            'elementHandlers': informeDescarga
        });
        doc.save('informe.pdf');
    });
</script>


@endsection
