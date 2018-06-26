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
            @if($empresa->departamento)
            <div class="col-md-4">
              <span class="label  ">Departamento:</span> {{ $empresa->departamento }}
            </div>
            @endif
            @if($empresa->municipio)
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
            @if($empresa->web)
            <div class="col-md-4">
                <span class="label">NIT:</span> {{ $empresa->nit }}
            </div>
            @endif

            </div>
            <!-- <div class= "row" style="margin-top:10px; align-content: center;">
              <a href="/profile/{{$empresa->id}}/edit" class="btn btn-primary pull-right" title="Editar"> Editar <span class="fa fa-edit"></span></a>
            </div> -->

    </div>
</div>
@endsection
