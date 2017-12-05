@extends('layouts.master') @section('title', 'Eliminar Pregunta') @section('content')
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
                {
                    "label": "Dimensión 1",
                    "value": "25"
                }, 
                {
                    "label": "Dimensión 2",
                    "value": "25"
                }, 
                {
                    "label": "Dimensión 3",
                    "value": "40"
                }, 
                {
                    "label": "Dimensión 4",
                    "value": "10"
                }
            ]
        }
    }).render();
});

  FusionCharts.ready(function () {
    var budgetChart2 = new FusionCharts({
        type: 'radar',
        renderAt: 'chart-container2',
        width: '1140',
        height: '450',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                "captionFontSize": "14",
                "subcaptionFontSize": "14",
                "numberPrefix":"$",
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
                "numberPreffix": "$",
                "legendBorderAlpha": "0",
                "legendShadow": "0"
            },
            "categories": [
                {
                    "category": [
                        { "label": "Dimensión 1" },
                        { "label": "Dimensión 2" },
                        { "label": "Dimensión 3" },
                        { "label": "Dimensión 4" },
                        { "label": "Dimensión 5" }
                    ]
                }
            ],
            "dataset": [
                {
                    "seriesname": "Allocated Budget",
                    "data": [
                        { "value": "10" },
                        { "value": "20" },
                        { "value": "30" },
                        { "value": "15" },
                        { "value": "5" }
                    ]
                }
            ]
        }
    }).render();
});
</script>
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
<div class="row">
  <div class="card col-12">
    <div class="card-body">
  <div id="chart-container2">FusionCharts will render here</div>
  </div>
  </div>
</div>
<h1>Resultados generales</h1>
<div class="row">
    <div class="col-md-2 resultado-g">
      {{$rCuestionario}}%
    </div>
    <div class="col-md-10">
      lorem
    </div>
</div>
<!-- <div class="row">
  <div class="card col-12">
    <div class="card-body">
      <h1></h1>
      <table class="table">
        @foreach($rImportancia as $i=>$importancia)
        <script type="text/javascript"></script>
        <tr>
          <td>{{ $dimensiones[$i]->nombre }}</td>
            <td>{{ $dimensiones[$i]->descripcion}}</td>
          <td>{{$importancia}}%</td>
          @endforeach
        </tr>
      </table>
    </div>
  </div>
</div> -->
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
