@extends('layouts.master') @section('title', 'Crear Indicador') @section('content')
<div class="row indicadores-form">
    <div class="card col-12">
        <div class="card-body">
            <h1>{{Auth::user()->nombre}}</h1>
            <form action="/" method="POST" class="form-control">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre empresa">
                </div>
                <div class="form-group">
                    <label for="Pais">Pais</label>
                    <input type="text" name="Pais" id="Pais" class="form-control" placeholder="Nombre empresa">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre empresa">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre empresa">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection