@extends('layouts.master') @section('title', 'Perfil Empresa') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
            <div class="row header">
            <div class="col-md-2"><i class="fa fa-address-card" aria-hidden="true"></i></div>
            <div class="col-md-8"><h1>{{$empresa->nombre}}</h1></div>
            <div class="col-md-2"><a class="btn btn-primary" href="/responder">Ver cuestionarios</a>
        </div></div>
            </div>
            <div class="row cuerpo">
            <div class="col-md-4">
                <span class="label">Pais:</span> {{ $empresa->pais }}
            </div>
            <div class="col-md-4">
                <span class="label">Municipio:</span> {{ $empresa->municipio }}
            </div>
            <div class="col-md-4">
                <span class="label">Departamento:</span> {{ $empresa->departamento }}
            </div>
            <div class="col-md-4">
                <span class="label">Web:</span> {{ $empresa->web }}
            </div>
            <div class="col-md-4">
                <span class="label">Numero de trabajadores:</span> {{ $empresa->num_trabajadores }}
            </div>
            <div class="col-md-4">
                <span class="label">NIT:</span> {{ $empresa->nit }}
            </div>
    
            </div>
            
    </div>
</div>
@endsection