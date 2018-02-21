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


                            @foreach($rDimensiones as $i=> $dimension)
                    { "label": "{{ $dimensiones[$i]->nombre }}"},
                            @endforeach
                    ]
                    }
                    ],
                    "dataset": [
                    {
                    "seriesname": "Porcentaje de afectacción",
                            "data": [
                                    @foreach($rDimensiones as $i=> $dimension)
                            { "value": "{{$dimension}}"},
                                    @endforeach
                            ]
                    }
                    ]
            }
    }).render();
    });</script>
<div class="content-blanco">
<h1>Información Basica</h1>
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
    <div class="col-md-10">
        lorem
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
    @foreach($rDimensiones as $i=>$dimension)
    <div class="card">
        <div class="card-header" role="tab" id="headingOne">
            <a data-toggle="collapse" href="#collapse{{ $i }}" aria-expanded="true" aria-controls="collapse{{ $i }}">
                <div class="row">
                    <div class="col-md-2 resultado-d" data-dime="{{$dimension}}">
                        {{$dimension}}%
                    </div>
                    <div class="col-md-4">
                        {{ $dimensiones[$i]->nombre }}
                    </div>
                    <div class="col-md-6">
                      {{ $dimensiones[$i]->descripcion }}
                    </div>
                </div>
            </a>
        </div>

        <div id="collapse{ $i }}" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>

<div class="content-blanco">
<h1>Reporte de Indicadores</h1>
<div id="accordion" role="tablist">
    @foreach($rIndicadores as $i=>$rindicador)
    <div class="card">
        <div class="card-header" role="tab" id="headingOne">
            <a data-toggle="collapse" href="#collapse{{ $i }}" aria-expanded="true" aria-controls="collapse{{ $i }}">
                <div class="row">
                    <div class="col-md-2 resultado-d" data-dime="{{$dimension}}">
                        {{$rindicador}}%
                    </div>
                    <div class="col-md-4">
                        {{ $indicadores[$i]->nombre }}
                    </div>
                    <div class="col-md-6">
                      {{ $indicadores[$i]->descripcion }}
                    </div>
                </div>
            </a>
        </div>

        <div id="collapse{ $i }}" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>


<script type="text/javascript">
    var content = $('.resultado-g').attr("data-sema");
    if (content >= 86 && content <= 100){
    $('.resultado-g').addClass('verde');
    }
    else if (content >= 57 && content <= 85){
    $('.resultado-g').addClass('otro-verde');
    }
    else if (content >= 31 && content <= 60){
    $('.resultado-g').addClass('amarillo');
    }
    else if (content >= 11 && content <= 30){
    $('.resultado-g').addClass('naranja');
    }
    else{
    $('.resultado-g').addClass('rojo');
    };

    var contentD = $('.resultado-d').attr("data-dime");
    if (contentD >= 86 && contentD <= 100){
    $('.resultado-d').addClass('verde');
    }
    else if (contentD >= 57 && contentD <= 85){
    $('.resultado-d').addClass('otro-verde');
    }
    else if (contentD >= 31 && contentD <= 60){
    $('.resultado-d').addClass('amarillo');
    }
    else if (contentD >= 11 && contentD <= 30){
    $('.resultado-d').addClass('naranja');
    }
    else{
    $('.resultado-d').addClass('rojo');
    };


    console.log(content);
</script>


@endsection
