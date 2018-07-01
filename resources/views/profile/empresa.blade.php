@extends('layouts.master') @section('title', 'Perfil de la Empresa') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
            <div class="row header">
            <div class="col-md-2"><i class="fa fa-address-card" aria-hidden="true"></i></div>
            <div class="col-md-9"><h1>{{$empresa->nombre}}</h1></div>
        </div>
        </div>
        <div class="row cuerpo">
              <div class="col-md-12">
                <h4>Datos del usuario</h4>
              </div>
            <div class="col-md-4">
                <span class="label">Nombre:</span> {{ $empresa->user->nombre }}
            </div>
            <div class="col-md-4">
                <span class="label">Correo electrónico:</span> {{ $empresa->user->email }}
            </div>
            <div class="col-md-4">
                <span class="label">Cargo:</span> {{ $empresa->user->cargo }}
            </div>
            <div class="col-md-12">
              <h4>Datos de la empresa</h4>
            </div>
            <div class="col-md-4">
                <span class="label">País:</span> {{ $empresa->pais }}
            </div>
            @if($empresa->departamento && ($empresa->pais === "Colombia"))
            <div class="col-md-4">
              <span class="label  ">Departamento:</span> {{ $empresa->departamento }}
            </div>
            @endif
            @if($empresa->municipio && ($empresa->pais === "Colombia"))
            <div class="col-md-4">
                <span class="label">Municipio:</span> {{ $empresa->municipio }}
            </div>
            @endif
            <div class="col-md-4">
                <span class="label">Dirección:</span> {{ $empresa->direccion }}
            </div>
            <div class="col-md-4">
                <span class="label">Teléfono:</span> {{ $empresa->telefono }}
            </div>
            @if($empresa->web)
            <div class="col-md-4">
                <span class="label">Web:</span> {{ $empresa->web }}
            </div>
            @endif
            <?php
            $tamanos = ["Micro", "Pequeña", "Mediana", "Grande"];
             ?>
            <div class="col-md-4">
                <span class="label">Tamaño:</span> {{ $tamanos[$empresa->tamano-1] }}
            </div>
            <div class="col-md-4">
                <span class="label">Numero de trabajadores:</span> {{ $empresa->num_trabajadores }}
            </div>
            <div class="col-md-4">
                <span class="label">Sector económico:</span> {{ $empresa->sector_economico }}
            </div>
            @if($empresa->nit && ($empresa->pais === "Colombia"))
            <div class="col-md-4">
                <span class="label">NIT:</span> {{ $empresa->nit }}
            </div>
            @endif
            <?php
            function utf8_fopen_read($fileName) {
              $fc = iconv('windows-1250', 'utf-8', file_get_contents($fileName));
              $handle=fopen("php://memory", "rw");
              fwrite($handle, $fc);
              fseek($handle, 0);
              return $handle;
            }

            $filename = base_path('public\codigos_ciiu.csv');
            $file = utf8_fopen_read($filename, "r");
            $ciius = array();
            $ciius_description = array();
            while (($data = fgetcsv($file, 500, ",")) !==FALSE ){
                array_push($ciius, $data[0]);
                array_push($ciius_description, $data[1]);
            }

            $ciiu_array = array_combine($ciius, $ciius_description);
            fclose($file);
             ?>
            @if($empresa->ciiu_principal && ($empresa->pais === "Colombia"))
            <div class="col-md-12">
                <span class="label">CIIU principal:</span> {{ $empresa->ciiu_principal }} - {{$ciiu_array[$empresa->ciiu_principal]}}
            </div>
            @endif
            @if($empresa->ciiu_secundario && ($empresa->pais === "Colombia"))
            <div class="col-md-12">
              @if($empresa->ciiu_secundario === "Ninguno")
                <span class="label">CIIU secundario:</span> {{ $empresa->ciiu_secundario }}
              @else
                <span class="label">CIIU secundario:</span> {{ $empresa->ciiu_secundario }} - {{$ciiu_array[$empresa->ciiu_secundario]}}
              @endif
            </div>
            @endif

            </div>
            <div class= "row" style="margin-top:10px; align-content: center;">
              <a href="/profile/{{$empresa->id}}/edit" class="btn btn-primary pull-right" title="Editar"> Editar <span class="fa fa-edit"></span></a>
            </div>

    </div>
</div>
@endsection
