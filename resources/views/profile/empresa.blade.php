@extends('layouts.master') @section('title', 'Perfil Empresa') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
            <h1>{{$empresa->nombre}}</h1>
            <ul>
                <li>Pais: {{ $empresa->pais }}</li>
                <li>Municipio: {{ $empresa->municipio }}</li>
                <li>Departamento: {{ $empresa->departamento }}</li>
                <li>Web: {{ $empresa->web }}</li>
                <li>Numero de trabajadores: {{ $empresa->num_trabajadores }}</li>
                <li>NIT: {{ $empresa->nit }}</li>
            </ul>
            <a class="btn btn-primary" href="/responder">Ver cuestionarios</a>
        </div>
    </div>
</div>
@endsection